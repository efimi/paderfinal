@extends('layouts.master')

@section('main')
<div class="pinwall shadow">
	<div class="pinwall__header">
		<div class="pinwall__header-info  shadow">
			<h2>{{$location->name}}</h2>
		</div>
		<div class="pinwall__header-map">
			@include('partials.map', ['height' => '100%', 'width' => '100%', 'location' => $location])
		</div>
		<div class="pinwall__body">
			<p>Cool dass du bei 
				<a class="btn btn--blue" href="{{$location->website}}">{{$location->name}}</a> 
				dabei bist!
				Hier kannst du mit deinen anderen Padermeetern genauers für dein Treffen ausmachen!</p>
			@include('partials.location--usedplaces')
		
			<div class="pinwall__chat card shadow">
				<div class="pinwall__chat-info">
					<p>Pinwand</p>
				</div>
				<div class="pinwall__chat-box">
					<chat></chat>
				</div>
			</div>
			<p class="pinwall__footer">
				Wenn du deine Freune noch zu dieser Location einladen möchtest drücke auf einen der folgenden Buttons:
			</p>

			<div class="pinwall__footer-share">
				<a href="whatsapp:://send" data-text="Hi👋👋! Heute Abend schon was vor😉? Schau mal vorbei bei Padermeet.de🎉" data-href="www.padermeet.de" class="btn btn--blue shadow"> WhatsAPP</a>
				<a href="mailto:?subject=😀 Schau mal vorbei bei Padermeet🎉&body=Hi %0D%0AHast du heute abend noch was vor😉?%0D%0A%0D%0A Gehe mal auf www.padermeet.de und klicke auf den Button👇. %0D%0A%0D%0A Grüße" class="btn btn--blue shadow"> Email</a>
			</div>		
	</div>
	</div>
	

</div>


@endsection