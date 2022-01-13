<?php

namespace App\Http\ViewComposers;

use App\Models\Pages;
use Illuminate\View\View;

class FooterMenuComposer
{

  private $footerMenu;

  public function compose(View $view)
  {

    if (!$this->footerMenu) {
      $this->footerMenu = Pages::all();
    }

    $view->with('footerMenu', $this->footerMenu);
  }
}
