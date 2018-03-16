<?php

namespace App\Providers;

use App\Models\Match;
use Illuminate\Support\ServiceProvider;

class MatchMakeProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Match::observe(\App\Observers\MatchObserver::class);
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
