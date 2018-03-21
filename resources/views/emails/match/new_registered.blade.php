@component('mail::message')
# Hallo🎉!!!

Hast du heute 20:00 Uhr Zeit und Lust auf ein Padermeet Treffen?


@component('mail::button', ['url' => route('match')])
Jo warum nicht 😀
@endcomponent

Viel Spass,<br>
Dein {{ config('app.name') }}-Team
<br>
<hr>
<small>Um dich von diesem Benachrichtigungsservice abzumelden

@component('mail::button', ['url' => route('unsubscirbe', [
	't' => $user->token, 
	'i' => $user->id
	])
])
klicke hier
@endcomponent
	

</small>

@endcomponent
