<template>
	<div>	
		<div class="score btn btn--white flex flex__column" @click="showExplain">
			Deine PaderPoints: {{points}}
		</div>
		
			<small v-show="explain"> Pro Match bekommst du <b>100 Pp</b></small>
			<br>
			<small v-show="explain">Pro Pinnwand Post <b>1 Pp</b></small>
			<br>
			<small v-show="explain">Für das Einschalten der Benachrichtigungsfunktion bekommst du <b>200Pp</b> </small>
		
	</div>
</template>

<script>
	import Bus from '../../bus'
	export default {
		props: ['score'],
		data(){
			return {
				points: 0,
				explain: false
			}
		},
		created(){
			this.points = Number(this.score);
		},
		mounted(){
			Bus.$on('message.added',  (message) => {
				if(message.selfOwned){
					this.points = this.points + 1 
				}
			});
			Bus.$on('user.subscribed',() =>{
				this.points = this.points + 200
			})
		},
		methods:{
			showExplain(){
				this.explain = !this.explain
			},
		}
	}

</script>

<style lang="scss">

// .score{
// 	&__description{

// 	}
// 	&__points{

// 	}
// }
	
</style>