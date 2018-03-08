@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Match</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Deine Match ist {{$match->location->name}}
                    derzeit sind {{ $match->location->usedPlaces()}} auch auf diese Location gematch.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection