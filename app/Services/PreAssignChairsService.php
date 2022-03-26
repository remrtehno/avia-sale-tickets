<?php

namespace App\Services;

use App\Models\Flights;
use App\Models\PreAssignChairs;

class PreAssignChairsService
{

  public function getTotalAmountOfChairs(Flights $flight, PreAssignChairs $preAssignChairs)
  {
    $freeChairs = $preAssignChairs->getAllPreAssignChairs($flight->id);
    $assignedChairs = $flight->getSellers();

    return $this->getAmountOfPreAssignChairs($freeChairs) +
      $this->getAmountOfAssignedChairs($assignedChairs);
  }

  public function getAmountOfPreAssignChairs($freeChairs)
  {
    if (!count($freeChairs)) {
      return 0;
    }

    return $freeChairs->reduce(function ($sum, $item) {
      return $sum + $item->count_chairs;
    });
  }

  public function getAmountOfAssignedChairs($assignedChairs)
  {
    if (!count($assignedChairs)) {
      return 0;
    }

    return $assignedChairs->reduce(function ($sum, $item) {
      return $sum + $item->count();
    });
  }

  public function canBeCreated($availableChairs, $totalPreassignedChairs, $count_chairs)
  {
    if ($count_chairs < 1) {
      return false;
    }

    if ($availableChairs < $totalPreassignedChairs + $count_chairs) {
      return false;
    }

    return $availableChairs >= $totalPreassignedChairs && $availableChairs >= $count_chairs;
  }
}
