<template>
	<div>
		<div>
		  	<a class="btn btn--white" @click="unmatch">unmatch</a>
		
		</div>
		<small style="text-align: center">{{resultText}}</small>
		
	</div>
</template>

<script>
	
	export default {
		data(){
			return {
				
				resultText:''
			}
		},
		created(){
			
		},
		
		methods:{
			unmatch(){
				console.log('umatch handle')
				axios.post('/unmatch', {
					
				}).catch((e) => {
					console.log(e)
				});
				this.resultText = 'Du kannst nun wieder auf den Button Klicken bzw. die Seite neu laden und neu gematch werden.';
				
			}, 
			handleButton(){
				
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