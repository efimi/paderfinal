<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class SubscribtionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(\App\Observers\AccountObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
