<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CarbonServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    $translator = \Carbon\Carbon::getTranslator('ru');
    $transformDiff = function ($input) {
      return strtr($input, [
        'неделя' => 'неделю',
        'секунда' => 'секунду',
        'минута' => 'минуту',
      ]);
    };
    $translator->setTranslations([
      'day' => ':count boring day|:count boring days',
      'after' => function ($time) use ($transformDiff) {
        return $transformDiff($time);
      }
    ]);
  }
}
