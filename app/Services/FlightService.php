<?php

namespace App\Services;

use App\Models\Flights;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FlightService
{

  public function assignChairs(Flights $flight, User $user, $count_chairs)
  {
    $availableChairs = $flight->countChairs();

    if ($availableChairs < 1) {
      return 0;
    }

    $countChairs = $this->validateCount($availableChairs, request()->count_chairs ?? $count_chairs);

    $order = $flight->order()->create([
      'total' => $countChairs * $flight->getPrice(),
      //@TODO Do we need it?
      'user_id' => $flight->user_id,
      'status' => Order::PAID,
      'seller_id' => $flight->user_id
    ]);

    return $flight->avaliableChairs()
      ->limit($countChairs)
      ->whereNull('user_id')
      ->update(['user_id' => $user->id, 'seller_id' => $user->id, 'order_id' => $order->id]);
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
