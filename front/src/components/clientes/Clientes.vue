<template>
  <div class="container">
    <div class="row">
      <h1>Clientes</h1>
    </div>

    <div class="row">
      <router-link class="btn btn-success" to="/clientes/create">Crear Cliente</router-link>
      <button @click="getClientes" >perfil</button>
    </div>
  </div>
  
</template>

<script>
import auth from "@/logic/auth";
export default {
  name: "ClientesComponent",
  methods:{
     async getClientes(){
       await auth.getClientes().then((res)=>{
         console.log(res);
       });
    },
  }
};
</script>

<style>
</style>