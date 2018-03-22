<template>
	<div class="subscribe">
		 <a @click="handelButtonCLick" id="my-notification-button" class="btn btn--white">Schalte Benachrichtigungen ein😉</a>
	</div>
</template>

<script>

	export default {
		data(){
			return {
				 buttonSelector: "#my-notification-button",
			}
		},
		created(){
			
		},
		methods:{
			handelButtonCLick(){
				OneSignal.push(function() {
				  // Occurs when the user's subscription changes to a new value.
				  OneSignal.on('subscriptionChange', function (isSubscribed) {
				    console.log("The user's subscription state is now:", isSubscribed);
				    OneSignal.getUserId(function(userId) {
				      console.log("OneSignal User ID:", userId);
				      // (Output) OneSignal User ID: 270a35cd-4dda-4b3f-b04e-41d7463a2316    
				     });
				  });
				});
			},
		}
	}
</script>

<style lang="scss">
	$paderblue: hsl(201, 100%, 50%);
	
</style>