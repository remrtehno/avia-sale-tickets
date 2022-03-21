<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    public const BOOKED = 'booked';
    public const PAID = 'paid';
    public const AVAILABLE = 'available';

    protected $fillable = ['status', 'user_id', 'flight_id', 'total', 'exchange_rate', 'seller_id'];

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
}
