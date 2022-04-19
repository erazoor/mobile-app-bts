<template>
  <ion-page>
    <div class="background"></div>
    <ion-header>
      <ion-toolbar>
        <ion-title>Tab 2</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Tab 2</ion-title>
        </ion-toolbar>
      </ion-header>
      <section>
        {{ info.label }}
      </section>
      <ExploreContainer name="Tab 2 page" />
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
      login: "admin",
      password: "admin",
      info: "False",
    }
  },
  mounted() {
    axios
      .get('http://localhost/mobile-app/app/api/commandes')
      .then((response) => {
        this.info = response.data ? response.data : 'No data Available';
      })
      .catch(error => console.log(error))
  },
  components: {  IonHeader, IonToolbar, IonTitle, IonContent, IonPage/*,IonItem,IonInput,IonLabel,IonButton*/},
});
</script>
