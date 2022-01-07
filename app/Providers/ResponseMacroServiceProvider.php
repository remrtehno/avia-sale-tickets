<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
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

        Response::macro('returning', function ($value) {
            return Response::make(strtoupper($value));
        });


        Response::macro('departure', function () {
            return new Carbon(request()->get('departure'));
        });
    }
}
