<template>
  <ion-page>
    <ion-content :fullscreen="true">
      <div class="connexion">
      <h1>Connexion</h1>
      <div class="background"></div>

      <form @submit.prevent="log()">
      <ion-item id="input_login" style="margin-bottom: 2vh; border-radius: 10px; width: 30vw;">
        <ion-label position="floating">Login</ion-label>
        <ion-input v-model="login"/>
      </ion-item>
      
      <ion-item id="input_login" style="margin-bottom: 2vh; border-radius: 10px; width: 30vw;">
        <ion-label position="floating">Password</ion-label>
        <ion-input v-model="mdp"/>
      </ion-item>

      <div class="button"><ion-button type="submit" >Connexion</ion-button></div>
      </form>

      
      </div>
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import axios from "axios";
import {IonItem,IonInput,IonLabel,IonButton, IonPage, IonContent,toastController } from '@ionic/vue';

export default  defineComponent({
  name: 'Tab1Page',
  data() {
    return {
      login: "",
      mdp: "",
    }
  },
  components: {  IonContent, IonPage,IonItem,IonInput,IonLabel,IonButton},
  methods: {
    log() {
        axios
          .get(
            'http://localhost/api/produits.php?login='+this.login+'&password='+this.mdp
          )
          .then((response) => {
            if (response.status == 200) {
              window.location.href = "/tabs/tab2";
              console.log(response);
            }
          })
          .catch((error) => {
            this.openToast();
          });
      },
      async openToast() {
        const toast = await toastController.create({
          message: "Mauvais identifiants de connexion, veuillez réessayer.",
          duration: 5000,
        });
        return toast.present();
      },
    },
  }
);
</script>

<style scoped>

  .button{
    display: flex;
    justify-content: center;
    align-items: center;
  }

  div.connexion{
    display: flex;
    position: relative;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    top: 45%;
    transform: translateY(-50%);
  }

  div.connexion div.input{
    
    display: flex;
    flex-direction: column;
    margin: 2.5vh 0 2.5vh 0;
    width: auto;
  }

  div.connexion div.input input{
    margin: 1vh 0 1vh 0;
    padding: 1vh 1vw;
    border-radius: 5vh;
    border-color: #000;
    font-size: 17px;
  }

  div.connexion a{
    color: #000;
    text-decoration: none;
    background-color: #0F0F;
    padding: 15px 30px 15px 30px;
    border-radius: 50px ;
    transition: 250ms;
  }
  div.connexion a:hover{
    background-color: rgb(255, 0, 0) ;
  }
</style>