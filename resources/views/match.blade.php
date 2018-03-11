@extends('layouts.master')

@section('main')
<div class="content flex flex__column">
    <div class="title">
        <p>Schau mal was wir für dich gefunden haben!</p>
    </div>
    @include('partials.card--result')
</div>
    
@endsection