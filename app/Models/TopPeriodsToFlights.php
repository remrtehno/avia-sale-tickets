<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TopPeriodsToFlights
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $top_report_id
 * @property int $flight_id
 * @property string|null $period
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Flights $flight
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|TopPeriodsToFlights newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopPeriodsToFlights newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopPeriodsToFlights query()
 * @method static \Illuminate\Database\Eloquent\Builder|TopPeriodsToFlights whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPeriodsToFlights whereFlightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPeriodsToFlights whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPeriodsToFlights wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPeriodsToFlights whereTopReportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPeriodsToFlights whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPeriodsToFlights whereUserId($value)
 * @mixin \Eloquent
 */
class TopPeriodsToFlights extends Model
{
    use HasFactory;

    protected $fillable = ['period', 'flight_id', 'user_id', 'top_report_id'];


    static public function getFlights()
    {
        return self::whereDate('period', '>', now())->with('flight')->get()->map(function (self $item) {
            return $item->flight;
        })->filter(fn ($item) => $item)->filter(fn (Flights $flight) =>
        $flight->date->greaterThanOrEqualTo(now()));
    }


    static public function periods($period = null)
    {
        $periods = [
            "1 день" => now()->addDay(),
            '3 дня' => now()->addDays(3),
            '7 дней' => now()->addDays(7),
            '10 дней' => now()->addDays(10),
        ];

        if ($period) {
            return $periods[$period];
        }

        return $periods;
    }



    public function getPeriod()
    {
        if (!$this->period) {
            return null;
        }

        return new Carbon($this->period);
    }

    public function isPeriodExpired()
    {
        return now()->gt($this->getPeriod());
    }


    //relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flights::class, 'flight_id');
    }

    public function topReport()
    {
        //return $this->belongsTo(TopReports::class);
    }
}
