<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Laravel</title>
        @include('partials.head')
    </head>
    <body>
        <div class="app">
            <div class="content flex flex__column">
                <div class="title">
                    <p>Willkommen bei Padermeet!</p>
                    @include('partials.logo')
                    <p class="title__caption">Klicke auf den Button und erfahre wo es heute für dich hingeht!</p>
                </div>
                <div>
                    <a href="{{route('match')}}" class="btn btn--big shadow transform--towards">Hier Clicken!</a>
                </div>
                <div class="result__container"></div>

            </div>
            @include('partials.footer')
        </div>
    </body>
</html>
