<template>
	<div class="subscribe">
		<a href="#">Benachrichtigungen aktivieren</a>
	</div>
</template>

<script>

	export default {
		data(){
			return {
				_registration: null,
				
			}
		},
		created(){
			var OneSignal = window.OneSignal || [];
		    OneSignal.push(["init", {
		      appId: Laravel.keys.onsingal.app_id,
		      autoRegister: false,
		      notifyButton: {
		        enable: true /* Set to false to hide */
		      },
		      welcomeNotification: {
		        "title": "My Custom Title",
		        "message": "Thanks for subscribing!",
		        // "url": "" /* Leave commented for the notification to not open a window on Chrome and Firefox (on Safari, it opens to your webpage) */
		    },
		    }]);
		},
	}
</script>

<style lang="scss">
	$paderblue: hsl(201, 100%, 50%);
	
</style>