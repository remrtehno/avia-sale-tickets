<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

class SeatFlight extends Model
{
    use HasFactory;

    // Carbon instance fields
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'timeDeparture', 'timeArrival', 'date'];

    protected $fillable = [
        'img',
        'title',
        'intro_title',
        'intro',
        'description',
        'content',
        'price',
        'flight_id',
        'rating',
        'from',
        'to',
        'date',
        'dateArrival',
        'timeArrival',
    ];

    public function image()
    {
        return $this->hasOne('App\Image');
    }

    public function getTimeDepartureWithNameFrom()
    {
        return $this->timeDeparture->format('H:m') . ' ' . $this->from;
    }

    public function getTimeArrivalWithNameTo()
    {
        return $this->timeArrival->format('H:m') . ' ' . $this->to;
    }

    public function getInfoTimeAndAirports()
    {
        return $this->getTimeDepartureWithNameFrom()
            . Config::get('constants.time_separator')
            . $this->getTimeArrivalWithNameTo();
    }

    public function getTimeOnly()
    {
        return $this->timeDeparture->format('H:m')
            . Config::get('constants.time_separator')
            . $this->timeArrival->format('H:m');
    }

    public function getDuration()
    {
        return $this->timeArrival->diffForHumans($this->timeDeparture, [
            'parts' => 2,
            'short' => true
        ]);
    }
}
