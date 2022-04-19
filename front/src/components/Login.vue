<template>
  <section>
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                  </div>

                  <form action class="form" @submit.prevent="login">
                    <div class="form-group">
                      <input
                        v-model="form.email"
                        type="email"
                        class="form-control form-control-user"
                        id="exampleInputEmail"
                        aria-describedby="emailHelp"
                        placeholder="Ingrese el correo electronico..."
                      />
                    </div>

                    <div class="form-group">
                      <input
                        v-model="form.password"
                        type="password"
                        class="form-control form-control-user"
                        id="exampleInputPassword"
                        placeholder="Contraseña"
                      />
                    </div>

                    <button
                      type="submit"
                      class="btn btn-primary btn-user btn-block"
                    >
                      Ingresar
                    </button>
                  </form>
                  <hr />

                  <div class="text-center">
                    <router-link class="small" to="/register"
                      >Crear Cuenta</router-link
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import auth from "@/logic/auth";
import Swal from "sweetalert2";

export default {
  name: "LoginComponent",

  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      loginState:false,
    };
  },
  mounted() {
    auth.logout();
  },

  methods: {
    changeLoginState(state){
      return this.loginState=state
    },
    async login() {
      await auth.login(this.form)
        .then(()=>{
          this.$router.push("/dash")
        })
        .catch(() => {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Error, por favor valida tus credenciales!",
            showConfirmButton: false,
            timer: 2500,
          });
        });
    },
    async getProfile(){
      await auth.profile().then((res)=>{
        console.log(res);
      })      
    },

  },
};
</script>
