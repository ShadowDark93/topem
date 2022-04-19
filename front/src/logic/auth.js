import axios from "axios";


const ENDPOINT_PATH = "https://topem.sintraunipricol.com.co/public/api/";
let logued = false;
export default {

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
                if (response.data) {
                    localStorage.setItem('jwt', response.data.access_token);
                    logued = true;
                }
                return response.data;
            });
    },
    logued,
    logout() {
        localStorage.removeItem('jwt');
    }
};