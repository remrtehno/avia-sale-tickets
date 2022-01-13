<?php

namespace App\Http\ViewComposers;

use App\Models\Contacts;
use Illuminate\View\View;

class ContactsComposer
{

  private $contacts;

  public function compose(View $view)
  {
    if (!$this->contacts) {
      $this->contacts =  Contacts::first();
    }

    $view->with('contacts', $this->contacts);
  }
}
