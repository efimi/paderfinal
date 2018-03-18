<template>
	<div>
		<qrcode-reader @decode="onDecode" @locate="onLocate"></qrcode-reader>
	</div>
</template>

<script>

	export default{
		data(){
			return {
				
			}
		},
		methods: {
		  onDecode (content) {
		    // ...
		  },

		  onLocate (points) {
		    // ...
		  }
		}
	}
</script>