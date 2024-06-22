<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
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
        // setting level user
        Gate::define('admin', function (User $user) {
            return $user->role == "admin";
        });
        Gate::define('employee', function (User $user) {
            return $user->role == "employee";
        });
    }
}
