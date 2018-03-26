@extends('layouts.master')

@section('main')

	<div class="content  flex flex__column">
		<div class="choice flex flex__row">
		@foreach ($locations as $location)
			<div class="choice__box">
		 		@include('partials.card--choice')
			</div>
		@endforeach
		</div>
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