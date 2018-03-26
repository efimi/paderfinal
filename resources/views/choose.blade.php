@extends('layouts.master')

@section('main')

	<div class="content  flex flex__column">
		<div class="title">
			😀
			<p>Schau mal was wir für 📍dich gefunden haben!</p>
		</div>
		<small> Scrolle runter und suche dir eine ☝️ Location aus!</small>
		@foreach ($locations as $location)
			@include('partials.card--choice')
		@endforeach
		
	</div>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Choose</title>
	@include('partials.head')
</head>
<body> --}}


{{-- 
	<script src="{{ asset('js/app.js') }}"></script>	
</body>

</html> --}}