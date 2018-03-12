<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!--  Ajax Scripts-->
<script>
	window.Laravel = {!! json_encode([
		'csrfToken' => csrf_Token(),
		'user' => [
			'authenticated' => auth()->check(),
			'id' => auth()->check() ? auth()->user()->id : null,
			'name' => auth()->check() ? auth()->user()->name : null,
			'matchedLocationId' => auth()->check() ? auth()->user()->mLocationID() : null,
			'matchPosition' => auth()->user()->matchPosition(),
		], 
		'keys' => [
			'pusher' => config('broadcasting.connections.pusher.key')
		]
	]) !!};
</script>