<template>
  <ion-page>
    <div class="background"></div>
    <ion-header>
      <ion-toolbar>
        <ion-title>Tab 3</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">

      <form @submit.prevent="comment()">
      <ion-item id="input_commentary" style="margin-bottom: 2vh; border-radius: 10px; width: 30vw;">
        <ion-label position="floating">Commentaire</ion-label>
        <input type="text" v-model="commentary"/>
      </ion-item>
      <div class="button"><ion-button type="submit" >Envoyer</ion-button></div>
      </form>
      
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/vue';
import axios from "axios";

export default defineComponent({
  name: 'Tab3Page',
  data() {
    return {
      commentary: '',
      id: 1,
    }
  },
  methods: {
    comment() {
        axios
          .get(
            'http://localhost/mobile-app/app/api/commentaire.php?commentary='+this.commentary+'&id='+this.id
          )
          .then((response) => {
            if (response.status == 200) {
              window.location.href = "/tabs/tab2?id="+this.id+'&commentary='+this.commentary;
              console.log(response);
            }
          })
      },
    },
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage }
});
</script>

<style scoped>
  .background{
    position: absolute;
    z-index: -1;
    width: 100vw;
    height: 110vh;
    background-image: url("../assets/background.svg") !important;
    background-size: cover !important;
    background-repeat: no-repeat !important;
  }
</style>