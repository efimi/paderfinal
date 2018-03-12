<template>
	<transition> 

		<question-answer v-for="faq in faqs" :key="faq.id" :q="faq.question" :a="faq.answer">
	</transition>
</template>