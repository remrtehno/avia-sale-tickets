<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopPeriodsToFlights extends Model
{
    use HasFactory;

    protected $fillable = ['period', 'flight_id', 'user_id', 'top_report_id'];



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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flights::class);
    }

    public function topReport()
    {
        //return $this->belongsTo(TopReports::class);
    }
}
