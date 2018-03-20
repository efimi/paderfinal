@extends('layouts.master')

@section('main')
<div class="content flex flex__column">
    <div class="title">
        <p>Schau 😀 mal welche Location📍 wir für dich gefunden haben! 🎉</p>
    </div>
    @include('partials.card--result')
	
	<div class="title">
		<p>Hinterlasse einen Fußabdruck für die anderen 
		
			</p>
		<p>
		 schreibe etwas auf die Pinnwand von {{$match->location->name}}</p>
	</div>

    <div class="pinwall__chat card shadow">
				<div class="pinwall__chat-info">
					<p>{{$match->location->name}}'s Pinnwand 📌</p>
				</div>
				<div class="pinwall__chat-box">
					<chat></chat>
				</div>
	</div>
</div>
    
@endsection