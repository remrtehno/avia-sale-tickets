<?php

namespace App\Services\Search;

use App\Models\SeatFlight;
use Illuminate\Pagination\LengthAwarePaginator;

class ClosestDate
{

  public function getClosestDate(LengthAwarePaginator $seat_flights)
  {
    if ($seat_flights->count()) {
      return null;
    }

    return SeatFlight::withouDateBetween()
      ->orderByClosest()
      ->first();
  }
}
