<?php

namespace App\Http\ViewComposers;

use App\Models\Pages;
use Illuminate\View\View;

class FooterMenuComposer
{
  public function compose(View $view)
  {
    $view->with('footerMenu', Pages::all());
  }
}
