<template>
	<div class="feedback"> 
		<p>Wir würden uns über ein Feeback freuen</p>
		<form action="" class="feedback__form">
			<input type="text" class="feedback__form-input">
			<button class="feedback__form-button btn btn--white">Senden</button>
		</form>
			
		
	</div>
</template>

<script>

	export default{

	}

</script>

<style lang="scss">
.feedback {
	
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	&__form{
		&-input{
			background:none;
			color:white;
			font-size: 3vw;
			border: 2px solid white;
			border-radius: 100px;
			padding: 0.5vh 1vw;
			}	
		&-button{
			margin-right: 1vw;
			}
	
		}

	}

</style>