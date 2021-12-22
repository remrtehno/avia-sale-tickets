<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'seat_flight_id'];

    public function seat_flight()
    {
        return $this->belongsTo('App\SeatFlight');
    }
}
