<template>
	<v-collapse-wrapper> 
		<div class="faq">
			<div class="faq__question" v-collapse-toggle>
				<div class="faq__question-text">{{q}}</div>	
			</div>
			<div class="faq__answer" v-collapse-content>
				<p>{{ a }}</p>
			</div>
		</div>
		
	</v-collapse-wrapper>
</template>

<script>
	import VueCollapse from 'vue2-collapse'
	export default{
		props: ['q','a'],
		data(){
		
		}
	}
</script>