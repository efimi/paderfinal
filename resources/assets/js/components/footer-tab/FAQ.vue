<template>
	<v-collapse-group :style="styles"> 
		<!-- <question-answer v-for="faq in faqs" :key="faq.id" :q="faq.question" :a="faq.answer"></question-answer> -->
		<v-collapse-wrapper v-for="faq in faqs" :key="faq.id"> 
		<div class="faq">
			<div class="faq__question" v-collapse-toggle>
				<div class="faq__question-text">{{faq.question}}</div>	
			</div>
			<div class="faq__answer" v-collapse-content>
				<p>{{ faq.answer }}</p>
			</div>
		</div>
		
		</v-collapse-wrapper>
	</v-collapse-group>
</template>

<script>
	export default{
		data(){
			return {
				faqs: [],
				styles:{},
			}
		},
		created(){
			axios.get('/frequentquestions').then((response) =>{
				this.faqs = response.data
			});
			var faqHeight = faqs.length() * 5;
			this.styles = {
				'height' : faqHeight
				};

			}
	}

</script>