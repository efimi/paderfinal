<template>
	<div class="upload">
		Lade Hier dienen Avatar hoch:
		<div class="upload__form-group" :class="{'has-error': errors[this.sendAs]}">
			<label :for="sendAs">Avatar</label>
			<div v-if="uploading">Prozess...</div>
			<input v-else class="btn-login" type="file" v-on:change="fileChange" :name="sendAs">
			<div class="upload__help-block" v-if="errors[this.sendAs]">
				{{ errors[this.sendAs][0] }}
			</div>
		</div>

		<div>
			<input type="hidden" name="avatar_id" :value="avatar.id">
			<img class="avatar" alt="Current avatar" :src="avatar.path">
		</div>
	</div>

</template>

<script>
	import upload from '../mixins/upload'

	export default {
		props: [
			'currentAvatar'
		],
		data () {
			return {
				errors: [],
				avatar: {
					id: null, 
					path: this.currentAvatar
				}
			}
		},
		mixins: [
			upload
		],

		methods: {
			fileChange(e) {
				this.upload(e).then((response) => {
					console.log(response.data.data)
					this.avatar = response.data.data
				}).catch((error) => {
					if (error.response.status === 422) {
						this.errors = error.response.data
						return
					}

					this.errors = "Irgendwie ist was schief gegangen... Versuche es nochmal."
				})
			}
		}
	}
	
</script>

<style>
	
</style>
