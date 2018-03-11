<template>
  <div>
    <a :href="location.website" alt="für weitere infos hier clicken" class="card card--result shadow">
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
                  <h1 :v-text="location.name"></h1>
                  <p v-text="location.address">
                    
                  </p>
                  
              </div>
          </div>
    </a>    
  </div>
</template>

<script>
    export default {
        props:['location', 'used'],
        data(){
          return {
             
            googleMapsAPI: 'https://www.google.com/maps/embed/v1/place?key=AIzaSyBSTXswOvFmhkc_KAe1Hk7gYDg98Q15MqE&q=' + this.location.address+ ',Paderborn',
            
          }
        },

        created() {
      //       axios.get('/api/match').then((response) => {
      //       this.matches = response.data
      //       console.log(response.data)
      //       this.match = this.matches[0]
      //       console.log(this.match)
      // });
        }
    }
</script>
