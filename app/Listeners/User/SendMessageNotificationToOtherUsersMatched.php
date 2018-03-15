<?php

namespace App\Listeners\User;

use App\Events\Chat\MessageCreated;
use App\Notifications\Chat\NewPinwallPostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SnedMessageNotificationToOtherUsersMatched
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
     * @param  MessageCreated  $message, users
     * @return void
     */
    public function handle(MessageCreated $event)
    {
        $user = $event->message->user;
        $participants = $user->mToday->users();
        $otherUsers = $participants->diff($user);

        foreach ($otherUsers as $user) {
            $user->notify(new NewPinwallPostNotification($event->message));
        }
    }
}
