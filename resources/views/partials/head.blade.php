<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- One Signal -->
<script src="{{ asset('js/manifest.json')}}"></script>
<script src="{{ asset('js/OneSignalSDKWorker.js')}}"></script>
<script src="{{ asset('js/OneSignalSDKUpdaterWorker.js')}}"></script>
<script charset="UTF-8" src="//cdn.sendpulse.com/9dae6d62c816560a842268bde2cd317d/js/push/38c8997e1f50100407cbb08531059bd0_1.js" async></script>


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
			'pusher' => config('broadcasting.connections.pusher.key'),
			'onesignal' => [
				'app_id' => env('ONESIGNAL_APP_ID'),
				'vap_id' => env('VAPID_PUBLIC_KEY'),
			],
		]
	]) !!};
</script>