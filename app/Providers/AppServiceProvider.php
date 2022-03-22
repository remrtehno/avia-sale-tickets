<?php

namespace App\Providers;

use App\Http\ViewComposers\ContactsComposer;
use App\Http\ViewComposers\ExchangeRateComposer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Http\ViewComposers\FooterMenuComposer;
use App\Http\ViewComposers\PreAssignChairsComposer;
use App\Models\MetaInfo;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ContactsComposer::class);

        $this->app->singleton(FooterMenuComposer::class);

        $this->app->singleton(ExchangeRateComposer::class);

        $this->app->singleton(PreAssignChairsComposer::class);

        if ($this->app->environment() !== 'production') {
            $this->app->register(\Sven\ArtisanView\ServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapThree();
        Blade::component('components.breadcrumbs', 'breadcrumbs');

        //footer navigation
        view()->composer('*', FooterMenuComposer::class);

        view()->composer('*', ContactsComposer::class);

        view()->composer('*', ExchangeRateComposer::class);

        view()->composer('dashboard/*', PreAssignChairsComposer::class);

        // $this->app->singleton('exchange-rate', function ($app) {
        //     $exchangeRate = MetaInfo::where('meta_name', 'dollar_exchange_rate')->first();

        //     return $exchangeRate ? (int) $exchangeRate->meta_content : 0;
        // });

        JsonResource::withoutWrapping();
    }
}
