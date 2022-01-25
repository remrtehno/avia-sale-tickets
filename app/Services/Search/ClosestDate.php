<?php

namespace App\Services\Search;

use App\Models\Flights;
use Illuminate\Pagination\LengthAwarePaginator;

class ClosestDate
{

  public function getClosestDate(LengthAwarePaginator $seat_flights)
  {
    if ($seat_flights->count()) {
      return null;
    }

    return Flights::withouDateBetween()
      ->orderByClosest()
      ->first();
  }
}
