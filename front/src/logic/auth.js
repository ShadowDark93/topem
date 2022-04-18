import axios from "axios";
import Cookies from "js-cookie";
import vue from "vue";

const ENDPOINT_PATH = "https://topem.sintraunipricol.com.co/public/api/";

export default {
  setUserLogged(userLogged) {
    Cookies.set("userLogged", userLogged);
    vue.prototype.$logged = true;
  },
  getUserLogged() {
    return Cookies.get("userLogged");
  },
  register(name, email, password, password_confirmation) {
    const user = { name, email, password, password_confirmation };
    return axios.post(ENDPOINT_PATH + "/autn/regiser", user);
  },

  login(user) {
    return axios
      .post(ENDPOINT_PATH + 'auth/login', {
        email: user.email,
        password: user.password
      })
      .then(response => {
        if (response.data.accessToken) {
          localStorage.setItem('user', JSON.stringify(response.data));
        }
        return response.data;
      });
  },
  
  logout() {
    localStorage.removeItem('user');
  }
};

/* 
axios
      .get('https://topem.sintraunipricol.com.co/public/api/clientes')
      .then(response => {
        this.info = response.data
        console.log(this.info);
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
      .finally(() => this.loading = false)
*/
