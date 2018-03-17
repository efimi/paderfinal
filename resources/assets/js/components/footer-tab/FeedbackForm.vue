<template>
	<div class="feedback"> 
		<p>Wenn du dir noch weitere Features wünscht, Fehler gefunden hast oder uns einfach nur etwas mitteilen wolltest, dann schreib uns hier über das kleine Feld.</p>
		<p>Wir freuen uns über dein Feedback 😀</p>
		
		<form v-show="!sended" class="feedback__form" @submit.prevent>
			<input type="text" class="feedback__form-input" v-model="body" >
			<button class="feedback__form-button btn btn--white" @click="handleFeedbackInput">Senden 📯</button>
		<div class="feedback__text">
			<small v-show="!sended">Das Schickst du ab...</small>
			<p>{{body}}</p>
		</div>
		</form>
		<div v-show="sended">
			<p>Super Danke👍👍😘</p>
			<p>Wenn du den Fragebogen unten ansfüllen könntest wären wir dir sehr verbunden. 🤗</p>
		</div>
			
		
	</div>
</template>

<script>
	import moment from 'moment'
	export default{
		data(){
			return {
				body: null,
				returnMessage: null,
				sended: false, 
			}
		},
		methods:{
			handleFeedbackInput(){
				this.send();
				this.sended = true;
			},
			send(){
				if(!this.body || this.body.trim === ''){
					return
				}

				axios.post('/feedback', {
					body: this.body.trim(),
					user_id: Laravel.user.id,
					matchedLocationId: Laravel.user.matchedLocationId,
				
				}).catch(() => {
					this.returnMessage = "Hmm.. irgendwie haben wir ein server error. Sende uns einfach eine Mail unter info@padermeet.de! Wir wären Dir sehr verbunden!"
				})
			}
		}
	}

</script>

<style lang="scss">
.feedback {
	
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	&__text{
		padding: 1vw 2vw;
		font-size: 3vw;
	}
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
			font-size: 3vw;
			}
	
		}

	}

</style>