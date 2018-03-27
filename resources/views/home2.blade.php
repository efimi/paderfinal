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
        Hier hast kannst du ein Avatarbild hochladen und hast eine übersicht über deine bisherigen Matches</p>
      @include('partials.location--usedplaces')
      
      <div class="pinwall__chat card shadow">
        <div class="pinwall__chat-info">
          <p>Pinwand</p>
        </div>
        <div class="pinwall__chat-box">
          <chat></chat>
        </div>
      </div>
      
        

      <p class="pinwall__footer">
        Wenn du deine Freune noch zu dieser Location einladen möchtest drücke auf einen der folgenden Buttons:
      </p>

      <div class="pinwall__footer-share">
        <a href="whatsapp:://send" data-text="Hi👋👋! Heute Abend schon was vor😉? Schau mal vorbei bei Padermeet.de🎉" data-href="www.padermeet.de" class="btn btn--blue shadow"> WhatsAPP</a>
        <a href="mailto:?subject=😀 Schau mal vorbei bei Padermeet🎉&body=Hi %0D%0AHast du heute abend noch was vor😉?%0D%0A%0D%0A Gehe mal auf www.padermeet.de und klicke auf den Button👇. %0D%0A%0D%0A Grüße" class="btn btn--blue shadow"> Email</a>
      </div>    
  </div>
  </div>
  

</div>


@endsection
<div class="dashboard flex flex__column">
    <div class="dashboard__header">
        <h2>Dashboard</h2>
    </div>
    <chat></chat>
    
</div>
@endsection
