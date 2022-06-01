<?php

namespace App\Services;

use App\Models\Deposit;
use App\Models\Order;

class DepositService
{

  public function getDepositBySeller($sellerId)
  {
    $deposits = Deposit::where('seller_id', $sellerId)->where('customer_id', auth()->user()->id)->get();
    return $this->getTotalDeposit($deposits)->first();
  }

  public function getTotalDeposit($deposits)
  {
    return $deposits->groupBy('seller_id')->map(function ($depositItem, $key) {
      $deposit = new Deposit;
      $deposit->seller_id = $key;
      $deposit->sum = $depositItem->reduce(function ($acc, Deposit $item) {
        return $acc + $item->sum;
      }, 0);

      //Can we do like this? Change our model?

      $deposit->leftSum = $this->getLeftDeposit($deposit->sum, $deposit->seller_id);

      return $deposit;
    });
  }

  public function getOrderPayedByDepositBySeller($sellerId = null)
  {
    return Order::where('seller_id', $sellerId)
      ->where('user_id', auth()->user()->id)
      ->where('payed_by_deposit', 1)
      ->sum('total');
  }

  public function getLeftDeposit($depositSum, $sellerId)
  {
    $spent = $this->getOrderPayedByDepositBySeller($sellerId);

    return $depositSum - $spent;
  }
}
