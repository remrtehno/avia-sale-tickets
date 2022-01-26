<?php

namespace App\Services\Search;

use App\Models\Flights;
use Illuminate\Pagination\LengthAwarePaginator;

class ClosestDate
{

  public function getClosestDate(LengthAwarePaginator $flightss)
  {
    if ($flightss->count()) {
      return null;
    }

    return Flights::withouDateBetween()
      ->orderByClosest()
      ->first();
  }
}
