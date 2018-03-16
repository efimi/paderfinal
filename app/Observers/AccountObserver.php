<?php

namespace App\Observers;

use App\Models\User;

class AccountObserver
{
	public function updated(User $user)
	{
		if($user->subscirbed === true){
			$this->hanldeUsersEvent('subscribed', $user);
		}
		if($user->subscirbed === false){
			$this->hanldeUsersEvent('unsubscribed', $user);
		}
	}
	protected function hanldeUsersEvent($event, Match $user)
	{

		$class = config("account.events.{$event}", null);

		if ($class === null) {
			return;
		}
		event(new $class($user->user, $user));
	}
	

}