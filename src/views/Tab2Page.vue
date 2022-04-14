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

      <ExploreContainer name="Tab 2 page" />
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import axios from "axios";
import {/*IonItem,IonInput,IonLabel,IonButton, */IonPage, IonHeader, IonToolbar, IonTitle, IonContent,/*toastController*/ } from '@ionic/vue';

export default  defineComponent({
  name: 'Tab2Page',
  data() {
    return {
      login: "",
      mdp: "",
    }
  },
  components: {  IonHeader, IonToolbar, IonTitle, IonContent, IonPage/*,IonItem,IonInput,IonLabel,IonButton*/},
  methods: {
    log() {
        axios
          .get(
            'http://localhost/api/produits.php?login='+this.login+'&password='+this.mdp
          )
      },
    },
  }
);
</script>
