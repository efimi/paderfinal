<?php

namespace App\Listeners\Match;

use App\Events\Match\UserMatchedToLocation;
use App\Mail\Match\JoinTodayEmail;
use App\Models\User;
use App\Notifications\Match\NewUserMatchedToLocationSignal;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendAllUsersToJoinSignal
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
     * @param  UserMatchedToLocation  $event
     * @return void
     */
    public function handle(UserMatchedToLocation $event)
    {
        $unmatchedUsers = User::allUnmatchedToday();

        $subscribers = $unmatchedUsers->reject(function ($user, $key) {
            return $user->subscribed === 0 ;
        });
        foreach ($subscribers as $user) {
            if ($user->test === 1) {
               if (!empty($user->one_signal_player_id)) {
                $user->notify( new NewUserMatchedToLocationSignal($user));
               }
            }
        }
    }
}
