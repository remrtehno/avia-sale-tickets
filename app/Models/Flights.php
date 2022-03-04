<?php

namespace App\Models;

use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use PhpParser\ErrorHandler\Collecting;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use stdClass;

class Flights extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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

    protected $fillable = ['booking_id', 'date_arrival', 'rating', 'direction_to', 'direction_from', 'logo', 'comment', 'date', 'flight', 'count_chairs', 'price_adult', 'price_child', 'price_infant', 'total_purchased_price', 'total_sales_price',];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['user_id'];

    /**
     * Get count chairs for the flight.
     */
    public function countChairs()
    {
        return $this->chairs()
            // ->where('type', Chairs::ADULT)
            ->where('booking_id', null)
            ->get()->count();
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
     * Scope a query to get all cities
     */
    public function scopeCities(Builder $query)
    {
        $first = Flights::select('direction_from as city');

        $getQuery = request()->q;

        if ($getQuery) {
            $first->where('direction_from', 'like', "%$getQuery%");
        }

        $flights = DB::table('flights')->select('direction_to as city')
            ->union($first);

        if ($getQuery) {
            $flights->where('direction_to', 'like', "%$getQuery%");
        }

        return $flights;
    }

    /**
     * Scope a query to search flight including passengers
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
        if (request()->has('return_date') && request()->has('depart_date')) {
            $returning = new Carbon(request('return_date'));
            $returning->addHours(23)->addMinutes(59);

            $departure = new Carbon(request('depart_date'));

            return $query->whereBetween('date', [$departure, $returning]);
        }
    }

    /**
     * Scope a query to search different fields seat flight
     */
    public function scopeWithExcludes(Builder $query)
    {
        return $query;
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
        return $this->countChairs();
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
    public function getFullDate()
    {
        return $this->getDeparute()->translatedFormat('d F Y, l');
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

    public function getTickets()
    {
        $tickets = new Collection();

        $this->booking && $this->booking->each(function (Booking $book) use ($tickets) {
            $book->tickets->each(function (Ticket $ticket) use ($tickets) {
                $tickets->push($ticket);
            });
        });

        return $tickets;
    }


    //store files
    public function storeFiles($clean = false)
    {
        $fileName = 'logo';

        if (request()->file($fileName)) {
            $nameCollection = $this->getPathImages($fileName);

            if ($clean) {
                $this->clearMedia($nameCollection);
            }

            $this->addMedia(request()->file($fileName))
                ->toMediaCollection(
                    $nameCollection
                );
        }
    }

    public function clearMedia($collectionName)
    {
        return $this->clearMediaCollection($collectionName);
    }


    public function getPathImages($fileName)
    {
        return $this->id . '-'  . $fileName;
    }


    public function getImages($fieldName = 'logo')
    {
        return $this->getMedia($this->getPathImages($fieldName));
    }

    public function getImage()
    {
        $images = $this->getImages();

        return count($images) ? $images[0]->getFullUrl() : null;
    }


    /**
     * RELATIONSHIPS
     */
    public function chairs()
    {
        return $this->morphMany(Chairs::class, 'chairsable');
    }

    public function image()
    {
        return $this->hasOne('App\Image');
    }

    public function booking()
    {
        return $this->hasMany('App\Models\Booking', 'flights_id');
    }


    //RELATIONSHIPS
    public function user()
    {
        return $this->belongsTo(User::class);
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
}
