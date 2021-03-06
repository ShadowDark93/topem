import axios from "axios";


const ENDPOINT_PATH = "https://topem.sintraunipricol.com.co/public/api/";

export default {

    register(name, email, password, password_confirmation) {
        const user = { name, email, password, password_confirmation };
        return axios.post(ENDPOINT_PATH + "autn/regiser", user);
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
                }
                return response.data;
            });
    },

    authHeader() {
        let tk = localStorage.getItem('jwt');
        return {
            'Acept': 'application/json',
            'Authorization': 'Bearer ' + tk
        };
    },

    profile() {
        return axios.post(ENDPOINT_PATH + 'auth/profile', { headers: this.authHeader() }).
        then((response) => {
            console.log(response);
        })
    },

    logout() {
        localStorage.removeItem('jwt');
    },

    getClientes() {
        return axios.get(ENDPOINT_PATH + 'clientes', {
            headers: this.authHeader()
        })

    }
};