<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Tab 1</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Tab 1</ion-title>
        </ion-toolbar>
      </ion-header>
    
      <ExploreContainer name="Tab 1 page" />

      <div class="hello" v-if="connect == true">
        <img src="" alt="">
        <!-- <h1>True</h1> -->
        <h2>Bienvenue chez nous !</h2>
        <input type="text">
        <input type="password">
        <a >Connexion</a>
        <p>Pas de compte ? <a @click="connect = !connect">Inscription</a></p>
      </div>


      <div class="hello" v-else>
        <img src="" alt="">
        <!-- <h1>False</h1> -->
        <h2>Bienvenue !</h2>
        <input type="text">
        <input type="password">
        <a href="">S'inscrire</a>
        <p>Déjà un compte ? <a @click="connect = !connect">Connexion</a></p>
      </div>

    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/vue';
import ExploreContainer from '@/components/ExploreContainer.vue';

export default  defineComponent({
  name: 'Tab1Page',
  data() {
    return {
      message: "test",
      connect: true,
    };
  },
  components: { ExploreContainer, IonHeader, IonToolbar, IonTitle, IonContent, IonPage }
});
</script>
