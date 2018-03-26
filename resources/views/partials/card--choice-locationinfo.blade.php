@if( $location->usedPlaces() === 0)
	<p>Nice du würdes diese Location neu eröffnen!👍😉</p>
@endif
@if( $location->usedPlaces() === 1)
	<p>
		Derzeit kommt noch eine weitere Person!🙋
	</p>
@endif
@if ($location->usedPlaces() > 1 )	
	<p>
		Derzeit komm{{ $location->usedPlaces() <= 2 ? 't' : 'en'}} noch {{$location->usedPlaces() - 1}} weitere Person{{ $location->usedPlaces() <= 2 ? '' : 'en'}}!🙋
	</p>
@endif