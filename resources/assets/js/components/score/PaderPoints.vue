<tempalte>
	<div>	
		<div class="score btn btn--white">
			<div class="score__description">Deine PaderPoints: </div>
			<div class="score__points">{{points}}</div>
		</div>
	</div>
</tempalte>

<script>
	import Bus from '../../bus'
	export default {
		props: ['score'],
		data(){
			return {
				points: 0
			}
		},
		created(){
			this.points = this.score;
		},
		mounted(){
			Bus.$on('message.added',  (message) => {
				if(message.selfOwned){
					this.points = this.points + 1 
				}
			});
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