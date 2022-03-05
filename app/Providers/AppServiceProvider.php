<?php

namespace App\Providers;

use App\Http\ViewComposers\ContactsComposer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Http\ViewComposers\FooterMenuComposer;
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

        JsonResource::withoutWrapping();
    }
}
