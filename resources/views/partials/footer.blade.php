<footer class="footer">
		<div class="flex " style="justify-content: flex-end; ">

					
		</div>
		<div class="flex flex__column">

			<paderpoints score="{{ auth()->user()->score }}"></paderpoints>	
			{{-- <p>Wenn du Padermeet von einem anderen Device nutzen möchtest dann schicke dir zunächst eine Mail:</p>
			<translate-email-button></ranslate-email-button> --}}


			<p> Benachrichtigungsfunktion aktiviert? 😉 </p>
			<email-subscirbe subscription="{{auth()->user()->subscribed}}"></email-subscirbe>
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

		@include('partials.town')
</footer>