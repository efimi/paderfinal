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
        'App\Events\Match\UserMatchedToLocation' => [
            // 'App\Listeners\Match\SendAllUsersToJoinMail',
            'App\Listeners\Match\SendAllUsersToJoinSignal',

        ],
        'App\Events\Test\TestTrigger' => [
            'App\Listeners\Test\SendOSMessageToAllUsers'
        ],
        // 'App\Events\Chat\MessageCreated' => [
        //     'App\Listeners\User\SendNotificationToAllParticipants',
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
