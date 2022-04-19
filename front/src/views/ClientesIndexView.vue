<template>
  <ClientesComponent />
</template>

<script>
import ClientesComponent from "@/components/clientes/Clientes.vue";
/* import auth from "@/logic/auth"; */

export default {
  components: {
    ClientesComponent,
  },
  
  methods: {
    /* async getClientes() {
      await auth.getCliente().then((res) => {
        console.log(res);
      });
    }, */
  },
};
</script>

<style></style>
