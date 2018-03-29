<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Cache-Control" content="must-revalidate, max-age=10" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="csrf-session-token" content="{{ Session::token() }}">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">


<!-- Sharing Site -->
<meta property="og:site_name" content="Padermeet"/>
<meta property="og:title" content="Padermeet - Die neue Treffapp für Paderborn!"/>
<meta property="og:description" content="Mit Padermeet lernst du ganz leicht neue Leute kennen! Ein Button, ein Klick"/>
<meta property="og:image" content="{{url('/')}}/img/touch/apple-touch-icon-180x180.png">
<meta property="og:url" content="https://padermeet.de/click">
<meta property="og:type" content="website"/>


<!-- Touch Icon -->
<link rel="shortcut icon" href="{{url('/')}}//favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{url('/')}}/img/touch/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="{{url('/')}}/img/touch/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="{{url('/')}}/img/touch/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="76x76" href="{{url('/')}}/img/touch/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="114x114" href="{{url('/')}}/img/touch/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="120x120" href="{{url('/')}}/img/touch/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="144x144" href="{{url('/')}}/img/touch/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="152x152" href="{{url('/')}}/img/touch/apple-touch-icon-152x152.png" />
<link rel="apple-touch-icon" sizes="180x180" href="{{url('/')}}/img/touch/apple-touch-icon-180x180.png" />


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
        "title": "Padermeet🎉",
        "message": "Nice 👍",
        // "url": "www.padermeet.de" /* Leave commented for the notification to not open a window on Chrome and Firefox (on Safari, it opens to your webpage) */
    },
    notifyButton: {
        enable: true, /* Required to use the Subscription Bell */
        size: 'medium', /* One of 'small', 'medium', or 'large' */
        theme: 'default', /* One of 'default' (red-white) or 'inverse" (white-red) */
        position: 'bottom-right', /* Either 'bottom-left' or 'bottom-right' */
        offset: {
            bottom: '30px',
            left: '0px', /* Only applied if bottom-left */
            right: '30px' /* Only applied if bottom-right */
        },
        prenotify: true, /* Show an icon with 1 unread message for first-time site visitors */
        showCredit: false, /* Hide the OneSignal logo */
        text: {
            'tip.state.unsubscribed': 'Schalte die Benachrichtigungen ein 😀',
            'tip.state.subscribed': "Benachrichtigungen sind eingeschaltet ✅",
            'tip.state.blocked': "Benachrichtigungen sind ausgeschaltet",
            'message.prenotify': 'Klicke hier ☝️ um Benachrichtigungen einzuschalten',
            'message.action.subscribed': "Super👍",
            'message.action.resubscribed': "Benachrichtigungen sind wieder aktiviert",
            'message.action.unsubscribed': "Du wirst keine Benachrichtiungen mehr erhalten",
            'dialog.main.title': 'Manage deine Benachrichtigungen',
            'dialog.main.button.subscribe': 'aktivieren',
            'dialog.main.button.unsubscribe': 'deaktiviern',
            'dialog.blocked.title': 'Deblockiere deine Benachrichtungen',
            'dialog.blocked.message': "Folge diesen Schritten🚶 um Benachrichtigungen zu erlauben:"
        }
    }
    
  });

    OneSignal.getUserId(function(userId) {
      console.log("OneSignal User ID:", userId);
      var data = new Object();
      @if(Auth::check())
      data.user_id = {{auth()->user()->id}};
      @endif
      data.one_signal_player_id = userId;

      var url = "/onesignalid";
      var xhr = new XMLHttpRequest();

      xhr.open("POST", url);
      xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
      xhr.setRequestHeader( );
      // xhr.onload = function() {
      //   var response = xhr.responseText;
      //   if (xhr.readyState == 4 && xhr.status == "200") {
      //           console.log(response);
      //   } else {
      //           console.log(response);
      //   }
      // }
      xhr.send(JSON.stringify(data));
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
      'matchPosition' => auth()->check() ? auth()->user()->matchPosition() : null ,
			'avatarPath' => auth()->check() ? auth()->user()->avatarPath() : null,
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