<?php

namespace App\Models;

use App\Http\Requests\SearchRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Config;

class SeatFlight extends Model
{
    use HasFactory;

    // Carbon instance fields
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'departure', 'returning', 'date'];

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


    /**
     * Scope a query to search seat flight between date
     */
    public function scopeBetweenDate(Builder $query)
    {
        if (request()->has('returning') && request()->has('departure')) {
            $returning = new Carbon(request()->get('returning'));
            $returning->addHours(23)->addMinutes(59);

            $departure = new Carbon(request()->get('departure'));

            return $query->whereBetween('date', [$departure, $returning]);
        }
    }

    /**
     * Scope a query to search different fields seat flight
     */

    public function scopeWithouDateBetween(Builder $query)
    {
        return $query->where(request()->except(['departure', 'returning']));
    }

    //dates
    public function getDate()
    {
        return $this->date->format('M d, Y');
    }

    public function getTimeDepartureWithNameFrom()
    {
        return $this->departure->format('H:m') . ' ' . $this->from;
    }

    public function getTimeReturningWithNameTo()
    {
        return $this->returning->format('H:m') . ' ' . $this->to;
    }

    public function getInfoTimeAndAirports()
    {
        return $this->getTimeDepartureWithNameFrom()
            . Config::get('constants.time_separator')
            . $this->getTimeReturningWithNameTo();
    }

    public function getTimeOnly()
    {
        return $this->departure->format('H:m')
            . Config::get('constants.time_separator')
            . $this->returning->format('H:m');
    }

    public function getDuration()
    {
        return $this->returning->diffForHumans($this->departure, [
            'parts' => 2,
            'short' => true
        ]);
    }
}
