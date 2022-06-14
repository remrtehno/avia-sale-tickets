<?php

namespace App\Services;

use App\Models\Flights;
use App\Models\Order;
use App\Models\ReturnAssignedChairs;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class OrderService
{
  //@TODO HACK BECAUSE JOBS DOESN'T WORK
  public function setAsCanceledIfExpired(Collection $orders)
  {
    $orders->each(function (Order $order) {
      if ($order->status === Order::BOOKED && $order->isExpired()) {
        $order->markAsCanceled();
      }
    });
  }

  public function createNotificationReturnChairs($userId, $count_chairs, $flightId, $order_id)
  {
    return ReturnAssignedChairs::create([
      'user_id' => $userId,
      'owner_id' => Auth::user()->id,
      'count_chairs' => $count_chairs,
      'flight_id' => $flightId,
      'order_id' => $order_id,
    ]);
  }

  public function returnBackChairs(Flights $flight, $count_chairs, Order $order, $userReturnedId)
  {

    $flight->chairs()
      ->where('user_id', $userReturnedId)
      ->whereNull('status')
      ->limit($count_chairs)
      ->update(['user_id' => null, 'seller_id' => $flight->user_id, 'order_id' => $order->id]);
  }

  public function createReturendOrder(Flights $flight, $count_chairs, Order $order, $owner_id)
  {
    Order::create([
      'status' => Order::RETURNED,
      'user_id' => Auth::user()->id,
      'flight_id' =>  $flight->id,
      'total' => $order->price_adult * $count_chairs * -1,
      'count_chairs' => $count_chairs,
      'exchange_rate' => 0,
      'seller_id' => $flight->user_id,
      'price_adult' => $order->price_adult,
      'is_returned' => 1,
      'user_returned_id' => $owner_id,
      'uuid' => BookingService::UUIDOrder(),
    ]);
  }
}
