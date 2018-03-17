<template>
	<div class="subscribe">
		 <a @click="handleSubscribtion" id="my-notification-button" class="btn btn--white">Schalte Benachrichtigungen ein😉</a>
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
			handleSubscribtion(){
				var OneSignal = OneSignal || [];

				/* This example assumes you've already initialized OneSignal */
				OneSignal.push(function() {
				    // If we're on an unsupported browser, do nothing
				    if (!OneSignal.isPushNotificationsSupported()) {
				        return;
				    }
				    this.updateMangeWebPushSubscriptionButton(this.buttonSelector);
				    OneSignal.on("subscriptionChange", function(isSubscribed) {
				        /* If the user's subscription state changes during the page's session, update the button text */
				        OneSignal.getUserId( function(userId) {
					        axios.post('/onesignalid',{
					        	one_signal_player_id: userId,
					        }).catch((e) => {
								console.log(e)
							})
					      });
				        this.updateMangeWebPushSubscriptionButton(this.buttonSelector);
				    });
				});
			},
			onManageWebPushSubscriptionButtonClicked(event) {
		        getSubscriptionState().then(function(state) {
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
		        event.preventDefault();
		    }, 
		    updateMangeWebPushSubscriptionButton() {
		        var hideWhenSubscribed = false;
		        var subscribeText = "Benachrichtigungen abonnieren";
		        var unsubscribeText = "Benachrichtigungen ausschalten";

		        getSubscriptionState().then(function(state) {
		            var buttonText = !state.isPushEnabled || state.isOptedOut ? subscribeText : unsubscribeText;

		            var element = document.querySelector(this.buttonSelector);
		            if (element === null) {
		                return;
		            }

		            element.removeEventListener('click', onManageWebPushSubscriptionButtonClicked);
		            element.addEventListener('click', onManageWebPushSubscriptionButtonClicked);
		            element.textContent = buttonText;

		            if (state.hideWhenSubscribed && state.isPushEnabled) {
		                element.style.display = "none";
		            } else {
		                element.style.display = "";
		            }
		        });
		    },
		    getSubscriptionState() {
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

		},
	}
</script>

<style lang="scss">
	$paderblue: hsl(201, 100%, 50%);
	
</style>