@extends('layouts.app')

@section('main')
<div class="dashboard flex flex__column">
    <div class="dashboard__header">
        <h2>Dashboard</h2>
    </div>
    <div class="dashboard__body">
        <div class="dashboard__body-settings">
            <div class="dashboard__body-settings__avatar"></div>
            <div class="dashboard__body-setting__email"></div>
        </div>
        <div class="dashboard__body-table" style="overflow-x:auto;">
           <table style="border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
   ">
    {{-- th, td {
    text-align: left;
    padding: 8px;
}
 --}}
               <tr>
                   <th>Datum</th>
                   <th>Location</th>
                   <th>Teilnehmer</th>
                   {{-- <th>Bewertung</th> --}}
               </tr>
               @foreach (auth()->user()->matches as $match)
                <tr>
                   <td> {{$match->created_at->format('d.m.Y')}}</td>
                   <td> <a href="{{$match->location->website}}">{{$match->location->name}}</a></td>
                   <td> 
                        @foreach ($match->users() as $user)
                        {{$user->id}}
                        @endforeach
                   </td>
                   {{-- <td> <star-rating></star-rating></td> --}}
               </tr>
               @endforeach
               
           </table>

        </div>
    </div>
</div>
@endsection
