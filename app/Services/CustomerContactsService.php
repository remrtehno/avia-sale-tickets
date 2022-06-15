<?php

namespace App\Services;

use App\Models\CustomerContacts;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerContactsService
{
  public function getCustomers($collection)
  {
    $typeOfCustomers = Ticket::TYPES_PASSENGERS;
    $collectNewCustomers = collect();

    foreach ($typeOfCustomers as $type) {
      if (!isset($collection[$type])) {
        continue;
      }

      foreach ($collection[$type] as $newCustomer) {
        $collectNewCustomers->push($newCustomer);
      }
    }

    return $collectNewCustomers;
  }


  public function store($collection)
  {

    $this->getCustomers($collection)->each(function ($newCustomer) {
      return CustomerContacts::where(['passport_number' => $newCustomer['passport_number']])->firstOr(function () use ($newCustomer) {
        $customer = CustomerContacts::create($this->getNewCustomerData($newCustomer));

        $customer->user_id = Auth::user()?->id;
        $customer->save();
      });
    });
  }

  public function getNewCustomerData($newCustomer)
  {
    if (array_key_exists('bag', $newCustomer)) {
      return array_merge($newCustomer, ['bag' => 1]);
    }

    return $newCustomer;
  }
}
