<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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
