<?php

namespace App\Services;

use App\Models\Flights;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FlightService
{

  public function assignChairs(Flights $flight, User $user)
  {
    $availableChairs = $flight->countChairs();

    if ($availableChairs < 1) {
      return 0;
    }

    $countChairs = $this->validateCount($availableChairs, request()->count_chairs);

    $flight->order()->create([
      'total' => $countChairs * $flight->getPrice(),
      'user_id' => Auth::user()->id,
      'status' => Order::PAID
    ]);

    return $flight->avaliableChairs()
      ->limit($countChairs)
      ->whereNull('user_id')
      ->update(['user_id' => $user->id]);
  }

  public function validateCount($availableChairs, $countChairs)
  {

    if ($countChairs > $availableChairs) {
      return $availableChairs;
    }

    if ($countChairs < 0) {
      return 0;
    }

    return $countChairs;
  }
}
