<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Padermeet</title>
        @include('partials.head')
        <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('css/effect.css')}}">
    <script src="{{asset('js/modernizr.custom.js')}}"></script>
    </head>
    <body>
        <div id="preload-container" class="preload-container">
            <!-- initial header -->
            <header class="preload-header">
                <h1 class="preload-logo ">
                    <svg class="preload-inner" width="100%" height="100%" viewBox="0 0 300 160" preserveAspectRatio="xMidYMin meet" aria-labelledby="logo_title">
                        <title id="logo_title">PaderMeet - die Neue Treffapp für die Stadt Paderborn</title>
                        @include('partials.svgLoadingMarker')
                    </svg>
                </h1>
                <div class="preload-loader">
                    <svg class="preload-inner" width="60px" height="60px" viewBox="0 0 80 80">
                        <path class="preload-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                        <path id="preload-loader-circle" class="preload-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                    </svg>
                </div>
            </header>  
            <div class="preload-main">
                <div class="space--120"></div>
                <div id="app" class="app">
                    @yield('main')
                    @include('partials.footer')
                    
                </div>
            </div>
        </div>
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/pathLoader.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <!-- vue and stuff -->
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
