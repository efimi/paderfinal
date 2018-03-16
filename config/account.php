<?php 

return [

	'events' => [
		'subscribed' => \App\Events\User\UserSubscribedToEmailNotification::class,
		'unsubscribed' => \App\Events\User\UserUnsubscribedToEmailNotification::class,
	],
];