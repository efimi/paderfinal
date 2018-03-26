

<form action="{{route('match-by-id')}}" class="card card--result shadow">
	 {{ csrf_field() }}
	<div class="card__map">
		 @include('partials.map', ['width' => 300, 'height' => 280 , 'location' => $location])
	</div>
	<div class="card__body">
		<h1>{{ $location->name}}</h1>
		<p>
			{{ $location->address}}
		</p>
		@include('partials.location--usedplaces', ['location' => $location])
		<br>
		<small>Klicke hier auf diese Ergebnisskarte für weitere Infos</small>
		<br>
		<button type='submit'></button>
	</div>
</form>
{{-- <card-result :location="{{json_encode($match->location)}}" :used={{$match->location->usedPlaces()}}></card-result> --}}