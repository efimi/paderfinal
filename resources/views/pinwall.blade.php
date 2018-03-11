@extends('layouts.master')

@section('main')
<div class="pinwall card shadow">
	<div class="pinwall__header">
		<div class="pinwall__header-info  shadow">
			<h2>{{$location->name}}</h2>
		</div>
		<div class="pinwall__header-map">
			@include('partials.map', ['height' => '100%', 'width' => '100%', 'location' => $location])
		</div>
		<div class="pinwall__body">
			<p>Cool dass du bei <a class="btn btn--blue" href="{{$location->website}}">{{$location->name}}</a> dabei bist!
				Hier kannst du mit deinen anderen Padermeetern genauers für dein Treffen ausmachen!</p>
			@include('partials.location--usedplaces')
		</div>
		<div class="pinwall__chat">
			<chat></chat>
		</div>
	</div>
	<div class="pinwall__chat">
		
	</div>

</div>


@endsection