<template>
  <ion-page>
    <div class="background"></div>
    <ion-header>
      <ion-toolbar>
        <ion-title>Tab 2</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <section class="card-section">
        <div class="card" v-for="info in infos" :key="info">
          <div class="card-header">
            <h1 v-if="infos"> {{infos[i].label }} </h1>
            <h1 v-else> Loading </h1>
          </div>
          <div class="card-body">
            <h2>Chaise | x4 - Table | x1 - Lampe | x2</h2>
          </div>
          <div style="display: none;">{{ i++ }}</div>
        </div>
      </section>
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import axios from "axios";
import {/*IonItem,IonInput,IonLabel,IonButton, */IonPage, IonHeader, IonToolbar, IonTitle, IonContent,/*toastController*/ } from '@ionic/vue';

export default defineComponent({
  name: 'Tab2Page',
  data() {
    return {
      id: 0,
      infos: [],
      i: 0,
    }
  },
  async mounted() {
    await axios
      .get('http://localhost/mobile-app/app/api/commandes')
      .then((response) => {
        this.infos = response.data ? response.data : 'No data Available';
      })
      .catch(error => console.log(error));
  },
  methods : {

  },
  components: {  IonHeader, IonToolbar, IonTitle, IonContent, IonPage/*,IonItem,IonInput,IonLabel,IonButton*/},
});
</script>

<style>
  .card-section{
    margin-top: 8vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .card{
    padding: 6vh 20vw;
    margin-bottom: 4vh;
    background: black;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 20px;
  }

  .card-header{
    margin-top: -3vh;
    margin-bottom: 6vh;
    text-align: center;
  }

  .card-body{

  }

  .background{
    position: absolute;
    z-index: 10;
    width: 100vw;
    height: 110vh;
    background-image: url("../assets/background.svg") !important;
    background-size: cover !important;
    background-repeat: no-repeat !important;
  }
</style>