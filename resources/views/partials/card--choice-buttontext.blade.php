@if( $location->usedPlaces() === 0)
	<p>
	ich gehe hier hin
	</p>
@endif
@if( $location->usedPlaces() === 1)
	<p>
		Das nehme ich auch!
	</p>
@endif
@if ($location->usedPlaces() > 1 )	
	<p>
		Da bin ich dabei!
	</p>
@endif
