<template>
	<div class="users flex flex__column">
		<div class="users__header">gerade online</div>
		<div class="users__user">
			{{emojis}}
			<!-- <a href="">{{ user.name }}</a>
			<img :src="user.name" alt="#" class="users__user-avatar"> -->
		</div>
	</div>
</template>

<script>
	// import pluralize from 'pluralize'
	import Bus from '../../bus'
	export default {
		data() {
			return {
				users: [],
				emojis: ""
			}
		},
		watch: {
			// pluralize: pluralize,
			users: function(){
				var emojiset = Array("😬","😀","😉","😄")
				for (var i = 0; i < this.users.length; i++) {
					this.emojis = this.emojis + " " + emojiset[Math.floor(Math.random()*emojiset.length)]
				}
			}
		},
		mounted() {
			Bus.$on('users.here', (users) => {
				this.users = users
			})
			.$on('users.joined', (user) => {
				this.users.unshift(user)
			})
			.$on('users.left', (user) => {
				this.users = this.users.filter((u) => {
					return u.id !== user.id
				})
			})
		}
	}
</script>

<style lang="scss">
	.users{
		margin: 2vh 3vw;
		// border-radius: 5px;
		// border: 2px solid #fff;

		&__header{
			padding: 15px;
			font-weight: 800;
			margin: 0;
			text-align: center;
		}

		&__user{
			padding: 0 15px;
			text-align: center;
			&:last-child {
				padding-bottom: 15px;
			}
		}

		&__user-avatar{
			border-radius: 50%;
			margin: 0 5px;
		}
	}
</style>