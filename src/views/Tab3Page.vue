<template>
  <ion-page>
    <div class="background"></div>
    <ion-header>
      <ion-toolbar>
        <ion-title>Tab 3</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <form @submit="onSubmit()" class="add-form">
        <div class="form-control">
          <label>Commentaire</label>
          <input type="text" name="commentaire" placeholder="Mettre un commentaire" />
        </div>
        <input type="submit" value="Save Information" class="btn btn-block" />
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
      commentaire: ""
    }
  },
  async onSubmit() {
    let commentary = { title: "Commentaire" };
    await axios
      .post(
        'http://localhost/mobile-app/app/api/commentaire', commentary
      )
      .then((response) => {
        this.commentaire = response.data;
      })  
      .catch((error) => {
        console.error(error);
      })
  },
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage }
});
</script>

<style>
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