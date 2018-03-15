<?php 

return [

	'events' => [
		'created' => \App\Events\User\UserMatchedToLocation::class,
		'filledUp' => \App\Events\Location\LocationFilledUp::class,
	],
];