<?php

namespace App\Observers;

use App\Models\Chat\Message;

class MessageObserver
{
	public function created(Message $match)
	{

		$this->hanldeUsersEvent('created', $match);

	}
	protected function hanldeUsersEvent($event, Message $match)
	{

		$class = config("message.events.{$event}", null);

		if ($class === null) {
			return;
		}
		event(new $class($message->user));
	}
	

}