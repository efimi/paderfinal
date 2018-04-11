@extends('layouts.master')
@section('main')
  <div class="content flex flex__column">
                <div class="title">
                    <p>Willkommen bei Padermeet!</p>
                    @include('partials.logo')
                    <p>Padermeet ist eine neue Treffapp für die Stadt Paderborn🎉</p>
                    <p>Beim Klick auf den Button werden dir 3 Locations📍 in der Innenstadt vorgeschlagen. </p>
                    <p>Davon kannst du eine auswählen👌</p>
                    <p>Auf die selbe Location werden bis zu 4 weitere Personen 🙋 gematcht</p>
                    <p>Das Padermeet-Treffen findet dort statt. 😀</p>
                    <p>Die Uhrzeit ist "fest" 🙃 um 20:00 Uhr.</p>
                    {{-- <p>Am besten ist, wenn du die Benachrichtigungsfunktion aktivierst!</p> --}}                   
                    <p>Probier es einfach aus!</p>
                    <small>Es ist vollkommen unverbindlich!</small>



                    <p class="title__caption">Klicke auf den Button und erfahre wo es heute für dich hingeht! </p>
                
                </div>
                
                <div>
                    <a href="{{route('choose')}}" class="btn btn--big shadow animate--shake">Hier Klicken!</a>
                </div>
                <div class="result__container"></div>

            </div>
@endsection 
