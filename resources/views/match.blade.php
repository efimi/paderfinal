@extends('layouts.master')

@section('main')
<div class="content flex flex__column">
    <div class="title">
        <p>Diene 😀  Location für heute Abend ist {{$match->location->name}}! 🎉</p>
    </div>
    @include('partials.card--result')
	
	<div class="title">
		 Heute 20:00!
		 
	</div>
	<div>
		<small>Tausche dich mit den anderen über die Pinnwand von {{$match->location->name}} aus.</small>
		<br>
		<small>Setzt Zeitpunkte, oder weiteres Organisatorisches hier fest!</small>
	</div>

    <div class="pinwall__chat card shadow">
				<div class="pinwall__chat-info">
					<p>{{$match->location->name}}'s Pinnwand 📜</p>
				</div>
				<div class="pinwall__chat-box">
					<chat></chat>
				</div>
	</div>

	<small> Passt dir die Location nicht? Dann löse dein Match auf:</small>
	<unmatch-button></unmatch-button>
	
</div>
    
@endsection