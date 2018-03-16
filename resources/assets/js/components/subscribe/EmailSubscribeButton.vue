<template>
	<div>
		<div class='centerMe'>
		  <div class='cta' @click="handleButton" :class="[(isActive) ? activeClass : '']">
		
		   <!--  <span v-if="!subscribed">Notify me</span>
		    <span v-else>Unsubscirbe</span> -->
			<span>{{buttonText}}</span>
		    <form v-on:submit.prevent>
		      <div class='input'>
		        <input v-model="email" placeholder='E-mail'>
		      </div>
		      <div class='button'>
		        <button :disabled="!isSendable" @click="handleEmailInput">Send</button>
		      </div>
		    </form>
		  </div>
		</div>
		<small style="text-align: center">{{resultText}}</small>
		
	</div>
</template>

<script>

	export default {
		props:['subscription'],
		data(){
			return {
				isActive: false,
				isSendable: false,
				activeClass: 'active', 
				// disabledClass: 'disabled',
				email: '',
				buttonText: '',
				resultText:''
			}
		},
		computed:{
			subscribe(){
				return this.subscription === '0';
			}
		},
		created(){
			if(this.subscribe) {
			this.buttonText = 'Notify'
			}
			else{
				this.buttonText = 'Unsubscribe'
			}
		},
		watch: {
			email: function(val){
				var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				 if (regex.test(val)) {
				 	this.isSendable = true;
				 }
				 else{
				 	this.isSendable = false;
				 }
			
			},
		},
		methods:{
			handleEmailInput(){
				console.log('handle')
				axios.post('/subscribeToNotifications/', {
					email: this.email,
					subscribe: this.subscribe
				}).catch((e) => {
					console.log(e)
				});
				this.buttonText = 'Alles klar👍'
				this.isActive = false
				this.resultText = 'Du wirst auf folgende Email benachrichtig: ' +this.email;
				
			}, 
			handleButton(){
				if (this.subscribe) {
					this.isActive = true
				}
				else{
					axios.post('/subscribeToNotifications/', {
					subscribe: false
					}).catch((e) => {
						console.log(e)
					});
					this.buttonText = 'Alles klar👍'
					this.resultText = 'Du wurdest abgemeldet'
				}
			}
		}
	}
</script>

<style lang="scss">
	$paderblue: hsl(201, 100%, 50%);
	
	@import url('https://fonts.googleapis.com/css?family=Roboto');
	$button-text: #FF7B73; 
	$background: #fff;
	$font-size:18px;
	.centerMe {  
		}

	 ::-webkit-input-placeholder {
	 	color: lighten($button-text, 10);
	 	background-color: $background;
	 }

// Dribbble related code

.cta {
	font-size: $font-size;
	color: $button-text;
	background: $background;
	font-weight: bold;
	border-radius: 25px;
	line-height: 50px;
	height: 50px;
	width: 170px;
	text-align: center;
	transition: width .2s ease-in-out;
	cursor: pointer;
	.hide { display: none; }
	form { display: flex; } // I know, I know.
	span {
		opacity: 0;
		width: 100%;
		text-align: center;
		animation: fadeIn .3s ease-in-out;
		animation-delay: .2s;
		animation-fill-mode: forwards;
	}
	.input {
		font-size: $font-size;
		display: none;
		opacity: 0;
		flex: 3;
		text-align: left;
		input {
			border: 0;
			width: 240px;
			// height: 45px;
			margin: 0 0 0 25px;
			outline: none;
			color: $button-text;
		}
	}
	.button {
		font-size: $font-size;
		display: none;
		opacity: 0;
		flex: 1;
		button {
			outline: none;
			float: right;
			padding: 0 15px;
			height: 40px;
			background: $button-text;
			border-radius: 25px;
			color: $background;
			border: 0;
			margin: 5px;
			cursor: pointer;
			transition: all .2s ease-in-out;
			&:disabled{ color: #FC9F9D; opacity: .8;  }
		}
	}
	&.sent { cursor: default; }
	&.active {
		width: 350px;
		text-align: left;
		transition: width .2s ease-in-out;
		cursor: default;
		span { display: none; }
		.input, .button {
			display: block;
			animation: fadeIn .3s ease-in-out;
			animation-delay: .1s;
			animation-fill-mode: forwards;
		}
	}
}

// Fade + slight zoom
@keyframes fadeIn {
	0% { opacity: 0; transform: scale(.7); }
	100% { opacity: 1; transform: scale(1); }
}
	
</style>