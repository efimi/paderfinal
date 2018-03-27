<template>
	<div>
		<img class="chat__message-avatar" :src="message.user.avatarPath" alt="">
		<div class="chat__message" :class="[classObject, cardColor]">
					
				<div class="chat__message-body">
					<span style="margin: 20px;">{{message.body}}</span>
					<span class="chat__message-timestamp">{{ time }}</span>
				</div>
		</div>
	</div>
</template>

<script>
	import moment from 'moment'
	export default {
		props: ['message'],
		data(){
			return{
				time: '',
				classObject: {
			      'chat__message--own': this.message.selfOwned
			    },
			    cardColor: ''
			}
		},
		computed(){
			colorClass:{
				var number = Math.floor(Math.random() * 7) + 1;
				return{
					"color--" + number + "";
				}
			},
			classObject: function() {
				     // returns a number between 1 and 7
				return{
					'chat__message--own': message.selfOwned,
					colorClass: true

				}

			}
		}
		created(){
			this.time = moment(this.message.created_at).format('HH:mm');
			this.cardColor = "color--" + this.message.matchPosition
		},
	}
</script>

<style lang="scss">
	.color{
			&--1{
				background-image: linear-gradient(112deg, #ff4f81, #ff6c5f);
				background-shadow: 0 2px 6px 0 rgba(255,108,95, 0.4);
			} 
			&--2{
				background-image: linear-gradient(284deg, #1cc7d0, #2dde98);
				background-shadow: 0 2px 6px 0 rgba(45,222,152, 0.4);
			}
			&--3{
				background-image: linear-gradient(80deg, #00aeff, #3369e7);
				background-shadow: 0 2px 6px 0 rgba(51,105,231, 0.4);
			}
			&--4{
				background-image: linear-gradient(80deg, #8E63E0, #401bb1);
				background-shadow: 0 2px 6px 0 rgba(64,27,177, 0.4);
			}

			&--5{
				background-image: linear-gradient(80deg, #ffc168, #e0350e);
				background-shadow: 0 2px 6px 0 rgba(64,27,177, 0.4);
			}
			&--6{
				background-image: linear-gradient(80deg, #f3c481, #a7616e);
				background-shadow: 0 2px 6px 0 rgba(167,97,110, 0.4);
			}
			&--7{
				background-image: linear-gradient(80deg, #ff4f81, #152e8a);
				background-shadow: 0 2px 6px 0 rgba(21,46,138, 0.4);			}
	}
	.chat{
		
		&__message{

			
		    margin: 2vh 0;
			border-radius: 30px;
			display: flex;
			flex-direction:row;
			justify-content: center;
			
			&__header{
			flex-direction:row;
				
			}
			&__footer{
				flex-direction:row;
				justif-conten:center;				
			}
			
			&-avatar{
				border-radius: 50%;
				max-width: 60px;
				margin: -50px 0;
			}

			&--own{
				
			}
			&-body{
			    hyphens: auto;
			    max-width: 240px;
				color: #fff;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				white-space: pre-wrap;
				& span {
				    display: inline-block;
				}
			}
			&-timestamp{
				color: hsl(201, 100%, 30%);
				font-weight: 800;
				margin: 0 20px;
			}
		}
	}
</style>