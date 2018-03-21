@component('mail::message')
# Hallo🎉!!!

Hast du heute Lust auf ein Padermeet Treffen?

Gerade hat sich ein neues Match gebildet: schau vielleicht vorbei

@component('mail::button', ['url' => route('match ')])
Gehe zum Match! 😀
@endcomponent

Viel Spass,<br>
Dein {{ config('app.name') }}-Team
@endcomponent
