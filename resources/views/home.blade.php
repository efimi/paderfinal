@extends('layouts.master')

@section('main')
<div class="pinwall shadow">
  <div class="pinwall__header">
    <div class="pinwall__header-info  shadow">
      <h2>Dashboard</h2>
    </div>

    <div class="pinwall__body">
      <p>Cool dass du heute bei 
       Padermeet
        dabei bist!
        Hier hast kannst du ein Avatarbild hochladen und bekommst eine Übersicht über deine bisherigen Matches.</p>

      
     
      <p> Deine Benachrichtigungsfunktion, kannst du hier aktivieren:</p>
      <email-subscirbe subscription="{{auth()->user()->subscribed}}"></email-subscirbe>

      {{-- @if(count(auth()->user()->mToday()))
      <div class="pinwall__chat">
        <div class="pinwall__chat-info">
          <p>Aktuelle Pinnwand</p>
        </div>
        <div class="pinwall__chat-box">
          <chat></chat>
        </div>
      </div>
      @endif --}}
      <div class="dashboard__body">
        <div class="dashboard__body-settings flex flex__column">
                  <form action="{{ route('account.update') }}" method="post" class="flex flex__column">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                      <div class="form-group">
                   <avatar-upload endpoint="{{ route('account.avatar.store') }}" send-as="image" current-avatar="{{ Auth::user()->avatarPath() }}"></avatar-upload>
                    </div>
                

                      <div class="form-group">
                        <button type="submit" class="btn btn--blue">übernehmen</button>
                      </div>
                  </form>
            <div class="dashboard__body-setting__email"></div>
        </div>
        <div class="dashboard__body-table" style="overflow-x:auto;">
          <h2>Deine Matches</h2>
           <table>
               <tr>
                   <th>Datum</th>
                   <th>Location</th>
                   <th>Teilnehmer</th>
                   {{-- <th>Bewertung</th> --}}
               </tr>
               @if(auth()->user()->matches()->count() >= 1)
               @foreach (auth()->user()->matches as $match)
                <tr>
                   <td> {{$match->created_at->format('d.m.Y')}}</td>
                   <td> <a href="{{$match->location->website}}">{{$match->location->name}}</a></td>
                   <td> 
                        @foreach ($match->users() as $user)
                        <img src="{{$user->avatarPath}}" alt="" class="table__avatar">
                        @endforeach
                   </td>
                   {{-- <td> <star-rating></star-rating></td> --}}
               </tr>
               @endforeach
               @endif
               
           </table>

        </div>
    </div>

    <div>
        <a href="{{ route('show-match') }}" class="btn btn--blue">zurück zur deinem Match 👈</a>
    </div>


@endsection
