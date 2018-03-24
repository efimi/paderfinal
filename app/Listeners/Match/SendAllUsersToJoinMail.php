<?php

namespace App\Listeners\Match;

use App\Events\Match\UserMatchedToLocation;
use App\Mail\Match\JoinTodayEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendAllUsersToJoinMail
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
        $withMail = $subscribers->reject(function($user){
            return $user->email === null;
        });
        foreach ($withMail as $user) {
            Mail::to($user->email)->send( new JoinTodayEmail($user));
        }
    }
}
