<?php 

return [

	'events' => [
		'created' => \App\Events\Match\UserMatchedToLocation::class,
		'filledUp' => \App\Events\Location\LocationFilledUp::class,
	],
];