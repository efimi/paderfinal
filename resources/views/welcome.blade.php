@extends('layouts.master')
@section('main')
  <div class="content flex flex__column">
                <div class="title">
                    <p>Moin 😀 lange nicht gesehen 🎉!!!!</p>
                    @include('partials.logo')
                    <p>Heute um 20:00 Uhr!!!</p>
                    <p class="title__caption">Klicke auf den Button und erfahre wo es für dich hingeht!</p>
                    <small>vollkommen unverbindlich!</small>
                </div>
                
                <div>
                    <a href="{{route('match')}}" class="btn btn--big shadow animate--shake">Hier Clicken!</a>
                </div>
                <div class="result__container"></div>

            </div>
@endsection 