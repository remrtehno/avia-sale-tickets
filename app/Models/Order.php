<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    // protected $primaryKey = 'uuid';


    public const BOOKING_MINUTES_LIMIT = 30;
    public const BOOKED = 'booked';
    public const PAID = 'paid';
    public const AVAILABLE = 'available';
    public const RETURNED = 'returned';

    protected $fillable = ['uuid', 'status', 'user_id', 'flight_id', 'total', 'exchange_rate', 'seller_id', 'price_adult', 'count_chairs', 'is_returned', 'user_returned_id', 'is_completed'];

    public function getRouteKeyName()
    {
        return 'uuid';
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
        $userId = Auth::user()->id;
        return $this->where('seller_id', $userId)->get();
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

        $this->changeStatusOfModel($this->booking->tickets, $status);
        $this->changeStatusOfModel($this->booking->chairs, $status);

        $this->booking->status = $status;
        $this->booking->save();

        $this->status = $status;
        return $this->save();
    }


    public function markAsCanceled()
    {
        return $this->changeStatus(self::AVAILABLE);
    }

    public function isExpired()
    {
        return $this->created_at->greaterThan($this->created_at->addMinutes(self::BOOKING_MINUTES_LIMIT));
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
}
