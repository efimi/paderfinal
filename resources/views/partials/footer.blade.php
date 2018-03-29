<footer class="footer">
		<div class="flex " style="justify-content: flex-end; ">

					
		</div>
		<div class="flex flex__column">

			<paderpoints score="{{ auth()->check() ? auth()->user()->score : 0}}"></paderpoints>	
			{{-- <p>Wenn du Padermeet von einem anderen Device nutzen möchtest dann schicke dir zunächst eine Mail:</p>
			<translate-email-button></ranslate-email-button> --}}


			<a href="{{ route('home') }}" class="btn btn--white">Dein Dashboard📋</a>  
			{{-- <small>Hier sollte ein Button sein:</small> --}}
			{{-- <onesignal-button></onesignal-button> --}}
			
		</div>
		<footer-tab></footer-tab>
		<div class="footer__copyright">
			<p> Copyrighy &copy; Padermeet 2018</p>
			<p>Made with ♥️</p>
		 	<a class="btn btn--white" href="{{route('survey')}}">Fragebogen zur Padermeet</a>
			{{-- @include('partials.facebook-comments') --}}
		</div>
		<div>
			<users-online></users-online>
		</div>
	
		<div class="flex flex__column">{{\App\Models\Match::mToday()->count()}} Match{{\App\Models\Match::mToday()->count() === 1 ? '' : 'es'}} heute | {{\App\Models\Match::all()->count()}} Matches total </div>

		

		@include('partials.town')
</footer>