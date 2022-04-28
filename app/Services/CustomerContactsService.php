<?php

namespace App\Services;

use App\Models\CustomerContacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerContactsService
{
  public function getCustomers($collection)
  {
    $typeOfCustomers = ['adults', 'children', 'infants'];
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
        $customer = CustomerContacts::create($newCustomer);

        $customer->user_id = Auth::user()?->id;
        $customer->save();
      });
    });
  }
}
