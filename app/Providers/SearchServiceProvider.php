<?php

namespace App\Providers;

use App\Services\Search\ClosestDate;
use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(ClosestDate::class, function ($app) {
            return new ClosestDate();
        });
    }
}
