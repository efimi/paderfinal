<footer class="footer">
		<div class="flex flex__column">
			<p>möchtest du dich unmachten? Dann klicke hier:</p>
			<unmatch-button></unmatch-button>
			<p>Wenn du padermeet von einem anderen Device nutzen möchtest dann schicke dir zunächst eine Mail:</p>
			<translate-email-button></ranslate-email-button>
			<p> Benachrichtigungsfunktion aktiviert? 😉 </p>
			<email-subscirbe-button subscription="{{auth()->user()->subscribed}}"></email-subscirbe-button>
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