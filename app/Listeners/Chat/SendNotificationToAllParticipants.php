<?php

namespace App\Listeners\Chat;

use \Chat\MessageCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToAllParticipants
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
     * @param  MessageCreated  $event
     * @return void
     */
    public function handle(MessageCreated $event)
    {
        //
    }
}
