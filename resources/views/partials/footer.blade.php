<footer class="footer">
		<div class="flex flex__column">
			<p> Benachrichtigungsfunktion aktiviert? 😉 </p>
			{{-- <email-subscirbe-button subscription="{{auth()->user()->subscribed}}"></email-subscirbe-button> --}}
			<onesignal-button></onesignal-button>
		</div>
		<footer-tab></footer-tab>
		<div class="footer__copyright">
			<p> Copyrighy &copy; Padermeet 2018</p>
			<p>Made with ♥️</p>
		 	<a class="btn btn--white" href="{{route('survey')}}">Fragebogen zur Padermeet</a>
			{{-- @include('partials.facebook-comments') --}}
		</div>

		@include('partials.town')
</footer>