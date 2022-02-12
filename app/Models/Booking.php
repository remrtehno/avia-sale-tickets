<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public const BOOKED = 'booked';
    public const PAID = 'paid';
    public const AVAILABLE = 'available';

    protected $fillable = ['uuid', 'flight_id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }

    public function chairs()
    {
        return $this->hasMany('App\Models\Chairs');
    }
    public function flight()
    {
        return $this->belongsTo('App\Models\Flights');
    }
}
