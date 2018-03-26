<template>
  <div class="card card--result shadow">

          <div class="">
              <div class="card__map">
                  <iframe
                    width="320"
                    height="300"
                    frameborder="0" style="border:0"
                    :src="googleMapsAPI" allowfullscreen> 
                  </iframe>
              </div>
              <div class="card__body">
                  <h1 v-text="location.name"></h1>
                  <p v-text="location.address"> </p>
              </div>
          </div>
      
  </div>
</template>

<script>
    export default {
        props:['location'],
        data(){
          return {

          }
        },
        computed: {
          googleMapsAPI(){
          return  ('https://www.google.com/maps/embed/v1/place?key=AIzaSyBSTXswOvFmhkc_KAe1Hk7gYDg98Q15MqE&q=' + this.location.address + ',Paderborn') 
          }
        },
        created() {
      
        },
        methods(){

        }
    }
</script>
