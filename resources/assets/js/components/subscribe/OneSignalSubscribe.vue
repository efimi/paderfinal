<template>
	<div class="subscribe">
		 <a @click="handelButtonCLick" id="my-notification-button" class="btn btn--white" v-text="buttonText"></a>
	</div>
</template>

<script>

	export default {
		data(){
			return {
				 subscribed: false,
				 buttonText: "Schalte Benachrichtigungen ein😉"
			}
		},
		mounted(){
				var OneSignal = OneSignal || [];
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
		methods:{
			handelButtonCLick(){
				this.getSubscriptionState().then(function(state) {
					if (state.isPushEnabled) {
		                /* Subscribed, opt them out */
		                OneSignal.setSubscription(false);
		            } else {
		                if (state.isOptedOut) {
		                    /* Opted out, opt them back in */
		                    OneSignal.setSubscription(true);
		                } else {
		                    /* Unsubscribed, subscribe them */
		                  OneSignal.registerForPushNotifications();
		                }
		            }
				});
		            
		            
			},
			getSubscriptionState(){
		        return Promise.all([
		          OneSignal.isPushNotificationsEnabled(),
		          OneSignal.isOptedOut()
			        ]).then(function(result) {
			            var isPushEnabled = result[0];
			            var isOptedOut = result[1];

			            return {
			                isPushEnabled: isPushEnabled,
			                isOptedOut: isOptedOut
				            };
				        });
		    },
		}	
	}
</script>

<style lang="scss">
	$paderblue: hsl(201, 100%, 50%);
	
</style>