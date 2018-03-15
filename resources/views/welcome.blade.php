@extends('layouts.master')
@section('main')
  <div class="content flex flex__column">
                <div class="title">
                    <p>Willkommen bei Padermeet!</p>
                    @include('partials.logo')
                    <p class="title__caption">Klicke auf den Button und erfahre wo es heute für dich hingeht!</p>
                
                </div>
                    <p> Benachrichtigungsfunktion aktiviert?😉</p>
                <a href="#" class="sp_notify_prompt btn btn--blue">Aktiviere 📯</a>

                <div>
                    <a href="{{route('match')}}" class="btn btn--big shadow animate--shake">Hier Clicken!</a>
                </div>
                <div class="result__container"></div>

            </div>
@endsection