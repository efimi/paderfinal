@component('mail::message')
# Übertrage dein Match

Hier kannst du dein Match auf ein anderes Gerät übertragen:
1. öffne diese Email auf dem Gerät auf welchem du Padermeet nutzen willst
2. klicke auf den Link



@component('mail::button', ['url' => route('login.token', [
	'token' => $user->token,
	'id' => $user->id,
	'headers' => [
		'Content-Type' => 'application/json'
		]
	])])
übertrage dein Match
@endcomponent

Viel Spass, dein<br>
{{ config('app.name') }}-Team
@endcomponent