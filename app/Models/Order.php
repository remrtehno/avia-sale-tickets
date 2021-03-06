<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $uuid
 * @property int $seller_id
 * @property int|null $user_id
 * @property int $booking_id
 * @property int $flight_id
 * @property int $total
 * @property string $status
 * @property int $exchange_rate
 * @property int $price_adult
 * @property int $count_chairs
 * @property int|null $user_returned_id
 * @property int|null $is_returned
 * @property int|null $is_completed
 * @property-read \App\Models\Booking|null $booking
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chairs[] $chairs
 * @property-read int|null $chairs_count
 * @property-read \App\Models\Flights $flight
 * @property-read \App\Models\User|null $seller
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCountChairs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereFlightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsReturned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePriceAdult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserReturnedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUuid($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;

    // protected $primaryKey = 'uuid';

    public const BOOKED_SECONDS_LIMIT = 1850;
    public const BOOKING_MINUTES_LIMIT = 30;
    public const BOOKED = 'booked';
    public const PAID = 'paid';
    public const AVAILABLE = 'available';
    public const RETURNED = 'RFND';

    protected $fillable = ['uuid', 'status', 'user_id', 'flight_id', 'total', 'exchange_rate', 'seller_id', 'price_adult', 'count_chairs', 'is_returned', 'user_returned_id', 'is_completed'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function isSoldToInternalUser()
    {
        return !$this->isTicketsExist();
    }

    private function changeStatusOfModel($model, $status)
    {
        $model->each(function ($item) use ($status) {
            $item->update(
                ['status' => $status]
            );
        });
    }

    public static function getStatuses()
    {
        return [self::BOOKED, self::PAID, self::AVAILABLE, self::RETURNED];
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getTotalFormatted()
    {
        return number_format($this->getTotal(), 2, '.', ' ');
    }

    public function getOrders()
    {

        if (Auth::user()->is_admin) {
            return $this->latest()->get();
        };

        $userId = Auth::user()->id;
        return $this->where('seller_id', $userId)->latest()->get();
    }

    public function getAssignedOrders()
    {
        $userId = Auth::user()->id;

        return $this->where('seller_id', $userId)->whereHas('flight', function ($query) use ($userId) {
            return $query->where('user_id', '!=', $userId);
        })->get();
    }

    public function getAssignedFlights()
    {
        $userId = Auth::user()->id;

        return Flights::where('user_id', '!=', $userId)->whereHas('chairs', function ($query) use ($userId) {
            return $query->where('seller_id', $userId);
        })->get();
    }

    public function getUserReturned()
    {
        return User::find($this->user_returned_id);
    }

    public function isPaid()
    {
        return $this->status === self::PAID;
    }

    public function changeStatus($status = self::BOOKED)
    {

        if (!$this->isSoldToInternalUser()) {
            $this->changeStatusOfModel($this->booking->tickets, $status);
            $this->changeStatusOfModel($this->booking->chairs, $status);

            $this->booking->status = $status;
            $this->booking->save();
        }


        $this->status = $status;
        return $this->save();
    }


    public function markAsCanceled()
    {
        return $this->changeStatus(self::AVAILABLE);
    }

    public function isExpired()
    {
        $createdAtNewInstace = new CarbonImmutable($this->created_at);

        return $createdAtNewInstace->addMinutes(self::BOOKING_MINUTES_LIMIT)->lessThan(now());
    }

    /**
     * Get the Seller.
     */
    public function seller()
    {
        return $this->hasOne(User::class, 'id', 'seller_id');
    }

    /**
     * Get the booking.
     */
    public function chairs()
    {
        return $this->hasMany(Chairs::class);
    }
    /**
     * Get the booking.
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    /**
     * Get the flight.
     */
    public function flight()
    {
        return $this->belongsTo(Flights::class);
    }
    /**
     * Get the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function canBePayed()
    {
        return now()->diffInMinutes($this->created_at) <= self::BOOKING_MINUTES_LIMIT;
    }

    public function isTicketsExist()
    {
        return $this?->booking?->tickets->count() > 0;
    }

    public function getCustomersEmails()
    {
        if (!$this->isTicketsExist()) {
            return collect();
        }

        return $this->booking->tickets()->where('status', Order::PAID)->get()->filter(function ($ticket) {
            return $ticket->email && !$this->booking->tickets->has($ticket->email);
        })->map(function ($ticket) {
            return $ticket->email;
        });
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i:s');
    }
}
