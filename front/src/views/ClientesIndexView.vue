<template>

  <ClientesComponent />

<dash/>
  
</template>

<script>
import ClientesComponent from "@/components/clientes/Clientes.vue";
import dash from '@/components/Dashboard.vue'

export default {
  components: {
    ClientesComponent,
    dash,
  },
  
  methods: {  },
};
</script>

<style></style>
