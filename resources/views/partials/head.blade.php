<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- One Signal -->
<script src="{{ asset('manifest.json')}}"></script>
<script src="{{ asset('OneSignalSDKWorker.js')}}"></script>
<script src="{{ asset('OneSignalSDKUpdaterWorker.js')}}"></script>

<link rel="manifest" href="manifest.json" />
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "2e680437-eebb-4b16-b97b-ee10e8fbcf1b",
      autoRegister: false,
      notifyButton: {
        enable: true,
      },
       welcomeNotification: {
        "title": "🎊Padermeet Cool das du dabei bist!",
        "message": "Diese Push Benachrichtigungen machen das Leben einfacher👍",
        "url": "www.padermeet.de" /* Leave commented for the notification to not open a window on Chrome and Firefox (on Safari, it opens to your webpage) */
    }
    });
  });
</script>

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