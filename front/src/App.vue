<template >
  <div class="div">
    <nav v-if="validate">
      <router-link to="/">Login</router-link> |
      <router-link to="/register">Registro</router-link>
    </nav>
    <router-view />
  </div>
</template>

<script>
export default {
  setup() {},
  data() {
    return {
      validate: false,
    };
  },
  updated() {
    this.statusLogin();
  },
  methods: {
    changeLogin(state) {
      if (state == true) {
        this.validate = true;
      } else {
        this.validate = false;
      }
      console.log(this.validate);
    },
    statusLogin() {
      console.log(this.validate);
    },
  },
};
</script>


<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
