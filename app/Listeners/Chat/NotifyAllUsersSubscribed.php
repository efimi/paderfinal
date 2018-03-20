<?php

namespace App\Listeners\Chat;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAllUsersSubscribed
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
