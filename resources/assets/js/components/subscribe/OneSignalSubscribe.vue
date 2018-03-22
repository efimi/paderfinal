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
			handelButtonClick(){
				OneSignal.getUserId(function(userId) {
			      console.log("OneSignal User ID:", userId);
			      // var data = new Object();
			      // data.user_id = {{auth()->user()->id}};
			      // data.one_signal_player_id = userId;

			      // var url = "/onesignalid";
			      // var xhr = new XMLHttpRequest();

			      // xhr.open("POST", url);
			      // xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
			      // xhr.setRequestHeader("content-type", "application/json");
			      // // xhr.onload = function() {
			      // //   var response = xhr.responseText;
			      // //   if (xhr.readyState == 4 && xhr.status == "200") {
			      // //           console.log(response);
			      // //   } else {
			      // //           console.log(response);
			      // //   }
			      // // }
			      // xhr.send(JSON.stringify(data));
			     });
			},
		}
	}
</script>

<style lang="scss">
	$paderblue: hsl(201, 100%, 50%);
	
</style>