<?php

namespace App\Services;

use App\Models\Flights;
use App\Models\TopPeriodsToFlights;

class TopPeriodsToFlightService
{
  public function cleanExpiredFlights()
  {
    $expiredFlights = TopPeriodsToFlights::where('period', '<', now())->with('flight')->get();

    $expiredFlights->each(function (TopPeriodsToFlights $topPeriodsToFlights) {

      $topPeriodsToFlights->flight->top = 0;
      $topPeriodsToFlights->flight->save();

      $topPeriodsToFlights->delete();
    });
  }
}
