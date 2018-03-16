@component('mail::message')
# Cool das du dabei bist🎉

Du hast die Benachrichtigungen eingschaltet, 
sobal du auf den folgenden Link klickst

@component('mail::button', ['url' => route('subscription.activate', [
	'token' => $user->token,
	'email' => $user->email
	])])
aktiviere
@endcomponent

Viel Spass, dein<br>
{{ config('app.name') }}-Team
@endcomponent
