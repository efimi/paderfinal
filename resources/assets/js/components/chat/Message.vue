<template>
	<div class="chat__message shadow" :class="{'chat__message--own': message.selfOwned}">
		<div class="chat__message-user">
			
		</div>
			<span class="chat__message-timestamp">{{ time }}</span>
			<p class="chat__message-body">{{ message.body }}</p>
	</div>
</template>

<script>
	import moment from 'moment'
	export default {
		props: ['message'],
		data(){
			var self = this;
			return{
				time: '',
				colorArray: ['hsl(210 , 82 , 50 )', 'hsl(130 , 50 , 51 )', 'hsl(337 , 50 , 46 )','hsl(133 , 50 , 65 )', 'hsl(28 , 50 , 70 )','hsl(180 , 50 , 59 )' , 'hsl(274 , 50 , 82 )'],
				colorClass:'',
				styles: {
					'background-color' : this.colorArray[2]
				},
			}
		},
		created(){
			this.time = moment(this.message.created_at).format('HH:mm');
			this.setColorClass(this.message.matchPosition);
		},
		methods: {
			setColorClass(number){
				this.colorClass = "color--" + number ;
			}
		}
	}
</script>

<style lang="scss">
	.color{
			&--1{background-color: hsl(210 , 82 , 50 );}
			&--2{background-color: hsl(130 , 50 , 51 );}
			&--3{background-color: hsl(337 , 50 , 46 );}
			&--4{background-color: hsl(133 , 50 , 65 );}
			&--5{background-color: hsl(28 , 50 , 70 );}
			&--6{background-color: hsl(180 , 50 , 59 );}
			&--7{background-color: hsl(274 , 50 , 82 );}
	}
	.chat{
		&__message{
			padding: 2vw 4vw;
			// border-bottom: 1px solid hsl(234, 100%, 40%);
			display: flex;
			flex-direction: column;
			align-content:center;
			margin: 4vh 5vw;
			border-radius: 30px;


			&--own{
				background-color: hsl(201, 100%, 55%);
				color: rgba(255,255,255,1);
				text-align: right;
			}

			&-user{
				font-weight: 800;
				&-avatar{
					border-radius: 50%;
					margin: 0 5px;
				}
			}

			&-timestamp{
				color: hsl(201, 100%, 30%);
				text-align: center;
				font-weight: 800;
			}

			&-body{
				margin-bottom: 0;
				white-space: pre-wrap; 
			}
		}
	}
</style>