<?php

namespace App\Listeners\User;

use App\Events\User\UserSubscribedToEmailNotification;
use App\Mail\Account\SubscribeActivationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendNotificationActivationEmail
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
     * @param  UserSubscribedToEmailNotification  $event
     * @return void
     */
    public function handle(UserSubscribedToEmailNotification $event)
    {

        Mail::to($event->user->email)->send(new SubscribeActivationEmail($event->user));

    }
}
