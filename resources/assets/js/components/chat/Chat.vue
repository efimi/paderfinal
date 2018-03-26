<template>
	<div class="chat">
		
		<form v-on:submit.prevent class="chat__form">
			
			<textarea 
			class="chat__form-input--text"
			id="body"
			cols=""
			rows="3"
			v-model="body"
			@keydown="handleMessageInput"
			></textarea>
		
			<a 
			class="chat__form-input--button btn bnt--white shadow"
			@click="handleButtonClick">
				📌
			</a>
			
		</form>
			<div class="chat__form-helptext flex flex__column">
				<p>Drücke Return um zu posten 📌</p>
			</div>
		<chat-messages></chat-messages>
	</div>
</template>

<script>
	import Bus from '../../bus'
	import moment from 'moment'
	export default {
		data(){
			return {
				body: null,
				bodyBackedUp: null
			}
		},
		methods:{
			handleMessageInput(e) {
				this.bodyBackedUp = this.body

				if (e.keyCode === 13 && !e.shiftKey) {
					e.preventDefault();
					this.send();
					this.body = null;

				}
			},
			handleButtonClick(){
					this.send();
					this.body = null;
			},
			buildTempMessage(){
				let tempId = Date.now();

				return {
					id: tempId,
					body: this.body, 
					created_at: moment().utcOffset('+0100').format('YYYY-MM-DD HH:mm:ss'),
					selfOwned: true,
					pinwallId: Laravel.user.matchedLocationId,
					matchPosition: Laravel.user.matchPosition, 
					user: {
						name: Laravel.user.name,
						avatarPath: Laravel.user.avatarPath
					}
				}
			},
			send(){
				if(!this.body || this.body.trim === ''){
					return
				}

				let tempMessage = this.buildTempMessage();

				Bus.$emit('message.added', tempMessage)

				axios.post('/chat/messages', {
					body: this.body.trim(),
					locationId: Laravel.user.matchedLocationId
				}).catch(() => {
					this.body = this.bodyBackedUp
					Bus.$emit('message.removed', tempMessage)
				})
			}
		}
	}
</script>

<style lang="scss">
	$paderblue: hsl(201, 100%, 50%);

	.chat{
		background-color: hsl(201, 100%, 100%); 
		// border: 1px solid $paderblue;
		overflow: hidden;
		&__form{
			padding: 10px;
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin: 0 5vw;
			&-input{
				height: 3vh;

				&--text{
					margin-left: 1vw;
					width: 80%;
					padding: 2vh 4vh;
					border-radius: 50px;
					border: 1px solid hsl(201, 100%, 50%);
					outline: none;
					
				}
				&--button{
					display: inline-block;
					padding: 0.5rem 1.2rem;
					margin: 0;
					text-decoration: none;
					border-radius: 100px;
					background-color:#fff;
					cursor: pointer;
					min-height: 10px;
					min-width: 10px;
				}

			}
			&-helpertext{
				color: #aaa;
				padding: 2vw 5vw;
			}
		}
	}
	
</style>