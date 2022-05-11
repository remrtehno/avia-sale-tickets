<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

/**
 * App\Models\Chairs
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $flight_id
 * @property int $chairsable_id
 * @property string $chairsable_type
 * @property string $uuid
 * @property string|null $status
 * @property int|null $booking_id
 * @property int|null $user_id
 * @property int $seller_id
 * @property int $order_id
 * @property-read \App\Models\Booking|null $booking
 * @property-read Model|\Eloquent $chairsable
 * @property-read \App\Models\Flights $flight
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\Ticket|null $ticket
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ChairsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs whereChairsableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs whereChairsableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs whereFlightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chairs whereUuid($value)
 * @mixin \Eloquent
 */
class Chairs extends Model
{
    use HasFactory;

    public const ADULT = 'ADT';
    public const CHILD = 'CHD';
    public const INFANT = 'INF';

    public const BOOKED = 'booked';
    public const PAID = 'paid';
    public const AVAILABLE = 'available';
    public const RETURNED = 'RFND';

    public const FIELDS = [
        'flight_id' => 'string',
        'order_id' => 'integer',
        'booking_id' => 'integer',
        'uuid' => 'string',
        'status' => 'string'
    ];

    protected $fillable = ['flight_id', 'uuid', 'status', 'seller_id', 'order_id'];




    public function getStatus()
    {
        if ($this->status) {
            return $this->status;
        }

        return is_null($this->booking_id) ? '' : self::BOOKED;
    }

    public function canDelete()
    {
        if ($this->isSoldToOtherUser()) {
            return false;
        }

        $status = $this->getStatus();

        return !$status;
    }

    public function isSoldToOtherUser()
    {
        $user_id = Auth::user()->id;

        $flight = Cache::remember('flight-chairs', 60, function () {
            return $this->flight;
        });

        return $flight->user_id !== $user_id || $this->seller_id !== $user_id;
    }

    /**
     * Get the parent commentable model (post or video).
     */
    public function chairsable()
    {
        return $this->morphTo();
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flights::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
