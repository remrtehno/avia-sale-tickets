<?php

namespace App\Providers;

use App\Http\Controllers\Dashboard\ChairsController;
use App\Models\Flights;
use App\Models\User;
use App\Policies\ChairsPolicy;
use App\Policies\FlightsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Flights::class => FlightsPolicy::class,
        ChairsController::class => ChairsPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-dashboard', function (User $user) {
            return $user->is_approved;
        });
    }
}
