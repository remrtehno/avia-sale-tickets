<?php

namespace App\Http\ViewComposers;

use App\Models\MetaInfo;
use Illuminate\View\View;

class ExchangeRateComposer
{

  private $dollarExchangeRate;

  public function compose(View $view)
  {

    if (!$this->dollarExchangeRate) {
      $this->dollarExchangeRate = MetaInfo::where('meta_name', 'dollar_exchange_rate')->first();
    }

    $view->with('dollarExchangeRate', $this->dollarExchangeRate->meta_content);
  }
}
