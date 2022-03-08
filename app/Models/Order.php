<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'user_id', 'flight_id'];

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
}
