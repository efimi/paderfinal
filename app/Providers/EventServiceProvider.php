<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // 'App\Events\User\UserMatchedToLocation' => [
        //     'App\Listeners\User\SendJoinNotificationToOtherUsersMatched',
        // ],
        // 'App\Events\Chat\MessageCreated' => [
        //     'App\Listeners\User\SendMessageNotificationToOtherUsersMatched',
        // ],
        'App\Events\User\UserSubscribedToEmailNotification' => [
            'App\Listeners\User\SendNotificationActivationEmail',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
