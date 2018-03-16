<?php

namespace App\Listeners\User;

use App\Events\User\UserMatchedToLocation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
    public function handle(UserMatchedToLocation $event)
    {
        //Notify User by Pushnotification
        $user = $event->user;
        $match = $user->mToday();
        $participants = $match->users();
        $otherUsers = $participants->diff($user);
        if($otherUsers === null) {
            return;
        }
        foreach ($otherUsers as $user) {
                // send notification via OpenSignal
        }
    }
}
