{{-- @extends('layouts.master')

@section('main')

@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Choose</title>
	@include('partials.head')
</head>
<body>
	@foreach ($locations as $location)
		<card-result location="{{$location}}"></card-result>

	@endforeach
	
	<script src="{{ asset('js/app.js') }}"></script>	
</body>

</html>