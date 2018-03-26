

<form action="{{route('match-by-id')}}" method="POST" class="card card--result shadow flex flex__column" style="margin-top: 1vh;">
	 {{ csrf_field() }}
	<div class="card__map">
		 @include('partials.map', ['width' => 300, 'height' => 280 , 'location' => $location])
	</div>
	<div class="card__body">
		<h1>{{ $location->name}}</h1>
	</div>
	<div style="margin-left: 15px">
		@include('partials.card--choice-locationinfo') 
	</div>
	<input type="hidden" name="LocId"	value="{{$location->id}}">
	<button type='submit' class="btn btn--white">
		Ich wähle das
	</button>
	<div class="" style="height: 1vh;"></div>
</form>
{{-- <card-result :location="{{json_encode($match->location)}}" :used={{$match->location->usedPlaces()}}></card-result> --}}