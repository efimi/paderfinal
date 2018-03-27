<tempalte>
	<div>
		<star-rating
		v-bind:increment="0.5" 
	    v-bind:max-rating="5" 
	    inactive-color="#000" 
	    active-color="#f00" 
	    v-bind:star-size="90"
		v-model="rating"
		@rating-selected ="handleRatingSet"></star-rating>

	</div>

</tempalte>

<script>
	import StarRating from 'vue-star-rating'
	export default{
		props: [ currentRating],
		data(){
			return{
				rating: 3,
				showConfirm: true,
			}
		},
		// created(){
		// 	if(currentRating !== null){
		// 		this.rating = currentRating
		// 	}
		// 	else{
		// 		this.rating = 0
		// 	}
		// },
		methods:{
			handleRatingSet(){
				this.showConfirm = true
			}
		}

	}

</script>