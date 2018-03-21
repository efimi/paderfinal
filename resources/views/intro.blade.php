@extends('layouts.master')
@section('main')
  <div class="content flex flex__column">
                <div class="title">
                    <p>Willkommen bei Padermeet!</p>
                    @include('partials.logo')
                    <p>Padermeet ist eine neue Treffapp für die Stadt Paderborn🎉</p>
                    <p>Beim Klick auf den Button wirst du auf eine Location von 24 Locations 📍 in der Innenstadt gematcht</p>
                    <p>Auf die selbe Location werden bis zu 4 weitere Personen 🙋 gematcht</p>
                    <p>Das Padermeet-Treffen findet dort statt. 😀</p>
                    <p>Die Uhrzeit ist "fest" 🙃 um 20:00 Uhr.</p>
                    <p>Probiert es einfach aus!</p>

                    <p class="title__caption">Klicke auf den Button und erfahre wo es heute für dich hingeht! </p>
                
                </div>
                
                <div>
                    <a href="{{route('match')}}" class="btn btn--big shadow animate--shake">Hier Clicken!</a>
                </div>
                <div class="result__container"></div>

            </div>
@endsection 