
<script>
import store from '@/store/index';
import app from '@/App.vue'

export default {
  name: "DashboardComponent",

  data() {
    return {
    };
  },

  mounted() {
    store.state.loginState=true;
    app.methods.changeLogin(store.state.loginState);
  },

  methods: {
    
  },
};
</script>
