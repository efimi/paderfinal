@if( $location->usedPlaces() === 0)
	<p>Nice!!! Du würdes diese Location neu eröffnen!🎉😀</p>
@endif
@if( $location->usedPlaces() === 1)
	<p>
		Derzeit kommt noch eine ☝ weitere Person!🙋
	</p>
@endif
@if ($location->usedPlaces() > 1 )	
	<p>
		Derzeit kommen noch {{$location->usedPlaces()}} weitere Personen!🙋
	</p>
@endif
