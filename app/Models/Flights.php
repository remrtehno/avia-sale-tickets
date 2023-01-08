<?php

namespace App\Models;

use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


/**
 * App\Models\Flights
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $flight
 * @property int $count_chairs
 * @property int $price_adult
 * @property int $price_child
 * @property int $price_infant
 * @property Carbon $date
 * @property Carbon $date_arrival
 * @property string $comment
 * @property string $logo
 * @property string $direction_from
 * @property string $direction_to
 * @property string $rating
 * @property int $penalty
 * @property string|null $booking_id
 * @property int|null $top
 * @property int $user_id
 * @property-read Collection|\App\Models\Booking[] $booking
 * @property-read int|null $booking_count
 * @property-read Collection|\App\Models\Chairs[] $chairs
 * @property-read int|null $chairs_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read Collection|\App\Models\Order[] $order
 * @property-read int|null $order_count
 * @property-read \App\Models\User $user
 * @method static Builder|Flights betweenDate()
 * @method static Builder|Flights cities()
 * @method static \Database\Factories\FlightsFactory factory(...$parameters)
 * @method static Builder|Flights newModelQuery()
 * @method static Builder|Flights newQuery()
 * @method static Builder|Flights orderByClosest()
 * @method static Builder|Flights query()
 * @method static Builder|Flights searchByDirections()
 * @method static Builder|Flights whereBookingId($value)
 * @method static Builder|Flights whereComment($value)
 * @method static Builder|Flights whereCountChairs($value)
 * @method static Builder|Flights whereCreatedAt($value)
 * @method static Builder|Flights whereDate($value)
 * @method static Builder|Flights whereDateArrival($value)
 * @method static Builder|Flights whereDirectionFrom($value)
 * @method static Builder|Flights whereDirectionTo($value)
 * @method static Builder|Flights whereFlight($value)
 * @method static Builder|Flights whereId($value)
 * @method static Builder|Flights whereLogo($value)
 * @method static Builder|Flights wherePenalty($value)
 * @method static Builder|Flights wherePriceAdult($value)
 * @method static Builder|Flights wherePriceChild($value)
 * @method static Builder|Flights wherePriceInfant($value)
 * @method static Builder|Flights whereRating($value)
 * @method static Builder|Flights whereTop($value)
 * @method static Builder|Flights whereUpdatedAt($value)
 * @method static Builder|Flights whereUserId($value)
 * @method static Builder|Flights withExcludes()
 * @method static Builder|Flights withPassengers()
 * @mixin \Eloquent
 * @property-read \App\Models\TopPeriodsToFlights|null $period
 */
class Flights extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public const FIELDS = [
        'flight' => 'string',
        'count_chairs' => 'integer',
        'price_adult' => 'integer',
        'price_child' => 'integer',
        'price_infant' => 'integer',
        'date' => 'timestamp',
        'date_arrival' => 'timestamp',
        'comment' => 'longtext',
        'logo' => 'string',
        'direction_from' => 'string',
        'direction_to' => 'string',
        'rating' => 'string',
        'penalty' => 'integer'
    ];

    public const PRICES_WITH_BAG = [
        'price_adult_bag' => 'integer',
        'price_child_bag' => 'integer',
        'price_infant_bag' => 'integer'
    ];

    public const OBSERVE_COLUMNS = ['date_arrival', 'date', 'direction_to', 'direction_from', 'price_adult', 'price_child', 'price_infant'];

    // Carbon instance fields
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'date', 'date_arrival'];

    protected $fillable = ['top', 'booking_id', 'date_arrival', 'rating', 'direction_to', 'direction_from', 'logo', 'comment', 'date', 'flight', 'count_chairs', 'price_adult', 'price_child', 'price_infant',  'price_adult_bag', 'price_child_bag', 'price_infant_bag', 'penalty'];

    protected $exchangeRate;



    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['user_id'];

    public function avaliableChairs()
    {
        return $this->chairs()
            ->where(function ($query) {
                $query
                    ->whereNull('booking_id')
                    ->orWhere('status', Chairs::RETURNED)
                    ->orWhere('status', Chairs::AVAILABLE);
            });
    }

    public function getChairsAvialiable()
    {
        return $this->avaliableChairs()->get();
    }

    public function getNotAssignedAvailableChairs()
    {
        return $this->avaliableChairs()->whereNull('user_id')->get();
    }

    public function getAvailableBookedChairs()
    {
        return $this->chairs()->whereNull('user_id')->get();
    }

    public function getAssignedChairs()
    {


        return $this->chairs()->where('user_id', Auth::user()->id)->get();
    }

    public function isAssignedTo($user_id = 0)
    {
        if (!$user_id) {
            $user_id = Auth::user()->id;
        }
        /*
            $isAssigned = !!Flights::where('id', $flights->id)->whereHas('order', function ($query) use ($user) {
                return $query->where('seller_id', $user->id);
            })->count();
        */
        if ($this->user_id === $user_id) {
            return false;
        }

        return !!$this->chairs()->where('seller_id', $user_id)->get()->count();
    }

    public function getChairs()
    {
        return $this->isAssignedTo() ? $this->getAssignedChairs() : $this->getAvailableBookedChairs();
    }

    public function getOwner()
    {
        return $this->isAssignedTo() ? User::find($this->user_id) : null;
    }

    public function getSellers()
    {
        return $this->chairs->whereNotNull('user_id')->groupBy('user_id');
    }

    /**
     * Get count chairs for the flight.
     */
    public function countChairs()
    {
        return $this->getChairsAvialiable()->count();
    }

    public function getTotal()
    {
        return $this->price_adult;
    }

    public function getPrice($type = 'adult')
    {
        return $this->{"price_$type"};
    }


    public function getPriceFormatted($type = 'adult')
    {
        return number_format($this->getPrice($type), 2, '.', ' ');
    }

    public function getGrandTotal()
    {
        return $this->getTotal();
    }

    public function getSummary()
    {
        $date = $this->getDate();
        $time = $this->getTime();

        return "$this->flight $date $time";
    }

    public function canBeDeleted()
    {
        return $this->booking->count() < 1;
    }

    /**
     * Scope a query to search by directions
     */
    public function scopeSearchByDirections(Builder $query)
    {
        $to = request()->destination_iata;
        $from = request()->origin_iata;

        $query->where('direction_from', 'like', "%$from%");
        $query->where('direction_to', 'like', "%$to%");

        return $query;
    }

    /**
     * Scope a query to get all cities
     */
    public function scopeCities(Builder $query)
    {
        $first = Flights::select('direction_from as city');

        $getQuery = request()->q;

        if (!$getQuery) {
            return $query;
        }


        $first->where('direction_from', 'like', "%$getQuery%");

        $flights = DB::table('flights')->select('direction_to as city')
            ->union($first);

        $flights->where('direction_to', 'like', "%$getQuery%");


        return $flights;
    }

    /**
     * Scope a query to search flight including passengers
     */
    public function scopeWithPassengers(Builder $query)
    {
        $passengers = request()->get('adults', 0) + request()->get('children', 0);

        return $query->where('count_chairs', '>=', $passengers);
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

            return $query->whereDate('date', $departure)->orWhereDate('date', $returning);
        } else if (request()->has('depart_date')) {
            $departure = new Carbon(request('depart_date'));

            return $query->whereDate('date', '=', $departure);
        }
    }

    public function scopeActual(Builder $query)
    {
        return $query->whereDate('date', '>=', now());
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
            'depart_date' => $dateFormatted,
            'return_date' => $dateFormatted
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
    public function getTime()
    {
        return $this->getDeparute()->translatedFormat('H:i');
    }
    public function getDateArrival()
    {
        return $this->getArrival()->translatedFormat('d M Y, D');
    }
    public function getTimeArrival()
    {
        return $this->getArrival()->translatedFormat('H:i');
    }
    public function getFullDate()
    {
        return $this->getDeparute()->translatedFormat('d F Y, l');
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

    public function getCountTickets()
    {
        return $this->booking->reduce(function ($sum, Booking $book) {
            return $sum + $book->tickets->count();
        }, 0);
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

    public function getAllCustomersEmails()
    {
        return $this->order->reduce(function ($collect, Order $orderItem) {
            $emailsOrder = $orderItem->getCustomersEmails();

            return $collect->merge($emailsOrder->count() ? $emailsOrder : $collect);
        }, collect());
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

    public function getRating()
    {
        return Rating::ratingByUser($this->user_id);
    }

    public function getPeriod()
    {
        if (!$this->period?->period) {
            return null;
        }

        return new Carbon($this->period->period);
    }

    public function getDaysLeftInTop()
    {
        if ($this->isPeriodExpired()) {
            return null;
        }

        return $this->getPeriod()->diffInDays() + 1;
    }

    public function isPeriodExpired()
    {
        return now()->gt($this->getPeriod());
    }

    /**
     * RELATIONSHIPS
     */
    public function order()
    {
        return $this->hasMany('App\Models\Order', 'flight_id');
    }

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function period()
    {
        return $this->hasOne(TopPeriodsToFlights::class, 'flight_id');
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
