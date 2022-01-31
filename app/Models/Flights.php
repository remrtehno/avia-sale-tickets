<?php

namespace App\Models;

use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Config;

class Flights extends Model
{
    use HasFactory;

    public const FIELDS = [
        'flight' => 'string',
        'count_chairs' => 'integer',
        'price_adult' => 'integer',
        'price_child' => 'integer',
        'price_infant' => 'integer',
        'total_purchased_price' => 'integer',
        'total_sales_price' => 'integer',
        'date' => 'timestamp',
        'date_arrival' => 'timestamp',
        'comment' => 'string',
        'logo' => 'string',
        'direction_from' => 'string',
        'direction_to' => 'string',
        'rating' => 'string',
    ];

    // Carbon instance fields
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'date', 'date_arrival'];

    protected $fillable = ['date_arrival', 'rating', 'direction_to', 'direction_from', 'logo', 'comment', 'date', 'flight', 'count_chairs', 'price_adult', 'price_child', 'price_infant', 'total_purchased_price', 'total_sales_price',];



    /**
     * Get count chairs for the flight.
     */
    public function countChairs()
    {
        return $this->chairs()->where('type', Chairs::ADULT)->get()->count();
    }

    /**
     * Get the chairs for the flight.
     */
    public function chairs()
    {
        return $this->hasMany(Chairs::class, 'flight_id');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new SearchScope);
    }

    public function image()
    {
        return $this->hasOne('App\Image');
    }

    public function getTotal()
    {
        return $this->price_adult;
    }

    public function getGrandTotal()
    {
        return $this->getTotal();
    }

    /**
     * Scope a query to search seat flight including passengers
     */
    public function scopeWithPassengers(Builder $query)
    {
        if (request()->has('child')) {
            $query->whereHas('chairs', function ($query) {
                $query->where('type', 'child');
            }, '>=', request('child'));
        }

        if (request()->has('adult')) {
            $query->whereHas('chairs', function ($query) {
                $query->where('type', 'adult');
            }, '>=', request('adult'));
        }

        if (request()->has('infant')) {
            $query->whereHas('chairs', function ($query) {
                $query->where('type', 'infant');
            }, '>=', request('infant'));
        }

        return $query;
    }

    /**
     * Scope a query to search seat flight between date
     */
    public function scopeBetweenDate(Builder $query)
    {
        if (request()->has('returning') && request()->has('departure')) {
            $returning = new Carbon(request('returning'));
            $returning->addHours(23)->addMinutes(59);

            $departure = new Carbon(request('departure'));

            return $query->whereBetween('date', [$departure, $returning]);
        }
    }

    /**
     * Scope a query to search different fields seat flight
     */
    public function scopeWithExcludes(Builder $query)
    {

        //@TODO Replace to something is more properly.
        return $query->where(request()->except(
            [
                'departure',
                'returning',
                'page',
                'adult',
                'child',
                'date',
                'price',
                'rating',
                'sort_by',
                'infant'
            ]
        ));
    }

    /**
     * Scope a query to fetch fresh dates seat flight
     */
    public function scopeOrderByClosest(Builder $query)
    {
        return $query->orderBy('date', 'ASC');
    }

    /**
     * Get URL with changed date for search
     */
    public function getUrlWithChangedDates()
    {
        $dateFormatted = $this->date->format('Y-m-d');

        return request()->fullUrlWithQuery([
            'departure' => $dateFormatted,
            'returning' => $dateFormatted
        ]);
    }


    public function getSeats()
    {
        return $this->count_chairs;
    }

    public function getFrom()
    {
        return $this->direction_from;
    }

    public function getTo()
    {
        return $this->direction_to;
    }

    //dates
    public function getDeparute()
    {
        return $this->date;
    }
    public function getArrival()
    {
        return $this->date_arrival;
    }
    public function getDate()
    {
        return $this->getDeparute()->translatedFormat('d M Y, D');
    }
    public function getTime()
    {
        return $this->getDeparute()->translatedFormat('H:i');
    }

    public function getTimeArrival()
    {
        return $this->getArrival()->translatedFormat('H:i');
    }

    public function getTimeDepartureWithNameFrom()
    {
        return $this->getDeparute()->format('H:m') . ' ' . $this->direction_from;
    }

    public function getTimeReturningWithNameTo()
    {
        return $this->getArrival()->format('H:m') . ' ' . $this->direction_to;
    }

    public function getInfoTimeAndAirports()
    {
        return $this->getTimeDepartureWithNameFrom()
            . Config::get('constants.time_separator')
            . $this->getTimeReturningWithNameTo();
    }

    public function getTimeOnly()
    {
        return $this->getDeparute()->format('H:m')
            . Config::get('constants.time_separator')
            . $this->getArrival()->format('H:m');
    }

    public function getDuration()
    {
        return $this->getArrival()->diffForHumans($this->getDeparute(), [
            'parts' => 2,
            'short' => true
        ]);
    }
}
