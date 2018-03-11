@if( $location->usedPlaces() === 1)
	<p>Woooooooowwww!! Du hast die Location {{ $location->name}} neu zum matchen eröffnet! </p>
	<p>🎊🎉🎈👏👏👏</p>
@endif
	
	<p>
		Derzeit komm{{ $location->usedPlaces() <= 2 ? 't' : 'en'}} noch {{$location->usedPlaces() - 1}} weitere Person{{ $location->usedPlaces() <= 2 ? '' : 'en'}}!🙋
	</p>