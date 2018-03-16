<?php

namespace App\Providers;

use App\Models\Chat\Message;
use Illuminate\Support\ServiceProvider;

class MessageMakeProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
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
