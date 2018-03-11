<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Laravel</title>
        @include('partials.head')
    </head>
    <body>
        <div id="app" class="app">
            @yield('main')
            @include('partials.footer')
            @include('partials.town')
        </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
