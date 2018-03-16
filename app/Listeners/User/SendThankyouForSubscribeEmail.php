<?php

namespace App\Listeners\User;

use App\Events\User\UserSuscribedToPushNotification;
use App\Notifications\User\EmailSubscribedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendJoinNotificationToOtherUsersMatched
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserSuscribedToEmailNotification $event)
    {
        //Notify User by Pushnotification
       $event->user->notify(new EmailSubscribedNotification);
    }
}
