<template>
  <div class="footer__collapse">
    <div class="tab">
    	<div class="tab__buttons">
    		<a  class="btn btn--white transform--towards" v-collapse-toggle="'faq'">FAQ</a> 
			| 
			<a class="btn btn--white transform--towards" v-collapse-toggle="'impressum'">Impressum</a>
			| 
			<a class="btn btn--white transform--towards" v-collapse-toggle="'feedback'">Feedback📝</a>
    	</div>
    	<div class="tab__content">
    		<v-collapse-wrapper ref="faq">
               <div v-collapse-content>
                    <faq></faq>
               </div>
            </v-collapse-wrapper>
    		<v-collapse-wrapper ref="impressum">
               <div v-collapse-content>
                    <impressum></impressum>
               </div>
            </v-collapse-wrapper>
    		<v-collapse-wrapper ref="feedback">
               <div v-collapse-content>
                    <feedback-form ></feedback-form>
               </div>
            </v-collapse-wrapper>
    	</div>
    </div>
  </div>
</template>

<script>
    import VueCollapse from 'vue2-collapse' 
    export default {
        props:['location', 'used'],
        
    }
</script>
