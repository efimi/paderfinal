
<a href="{{ route('pinwall') }}" alt="für weitere infos hier clicken" class="card card--result shadow">
		<div class="">
			<div class="card__map">
				 @include('partials.map', ['width' => 300, 'height' => 280 ,'location' => $match->location])
			</div>
			<div class="card__body">
				<h1>{{ $match->location->name}}</h1>
				<p>
					{{ $match->location->address}}
				</p>
				@include('partials.location--usedplaces', ['location' => $match->location])
				<br>
				<small>Klicke hier auf diese Ergebnisskarte für weitere Infos</small>
				<br>
			</div>
		</div>
</a>	
{{-- <card-result :location="{{json_encode($match->location)}}" :used={{$match->location->usedPlaces()}}></card-result> --}}