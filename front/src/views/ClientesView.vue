<template>
  <DashboardComponent>
    <ClientesComponent />
  </DashboardComponent>
</template>

<script>
import ClientesComponent from "@/components/Clientes.vue";
import DashboardComponent from "@/components/Dashboard.vue";

export default {
  components: {
    ClientesComponent,
    DashboardComponent,
  },
};
</script>

<style>
</style>