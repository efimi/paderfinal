<?php

namespace App\Providers;

use App\Models\Chat\Message;
use App\Models\Match;
use Illuminate\Support\ServiceProvider;

class ObserveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Match::observe(\App\Observers\MatchObserver::class);
        // Message::observe(\App\Observers\MessageObserver::class);
        
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
