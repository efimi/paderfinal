<?php

namespace App\Observers;

use App\Models\Match;

class MatchObserver
{
	public function created(Match $match)
	{

		$this->hanldeUsersEvent('created', $match);
		if ($match->location->isFilledUp()) {
			$this->handleLocationEvent('filledUp', $match);
		}
	}
	protected function hanldeUsersEvent($event, Match $match)
	{

		$class = config("match.events.{$event}", null);

		if ($class === null) {
			return;
		}
		event(new $class($match->user, $match));
	}

	protected function handleLocationEvent($event, Match $match)
	{

		$class = config("match.events.{$event}", null);

		if ($class === null) {
			return;
		}
		event(new $class($match));
	}
	

}