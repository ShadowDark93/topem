<template>
  <section class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crear una cuenta!</h1>
              </div>
              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input :model="form.name"
                      type="text"
                      class="form-control form-control-user"
                      id="exampleFirstName"
                      placeholder="Nombres"
                    />
                  </div>
                  <div class="col-sm-6">
                    <input :model="form.lastname"
                      type="text"
                      class="form-control form-control-user"
                      id="exampleLastName"
                      placeholder="Apellidos"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <input
                    type="email"
                    class="form-control form-control-user"
                    id="exampleInputEmail"
                    placeholder="Correo Electrónico"
                  />
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input :model="password"
                      type="password"
                      class="form-control form-control-user"
                      id="exampleInputPassword"
                      placeholder="Contraseña"
                    />
                  </div>
                  <div class="col-sm-6">
                    <input :model="confirmpassword"
                      type="password"
                      class="form-control form-control-user"
                      id="exampleRepeatPassword"
                      placeholder="Repetir Contraseña"
                    />
                  </div>
                </div>
                <a href="login.html" class="btn btn-primary btn-user btn-block">
                  Registrar Cuenta
                </a>
                <hr />
              </form>
              <hr />

              <div class="text-center">
                <router-link class="small" to="/">Estas registrado? Inicia Sesión</router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
</template>

<script>
import auth from "@/logic/auth";

export default {
  name: "RegisterComponent",

  data() {
    return {
      form: {
        name: "",
        lastname: "",
        email: "",
        password: "",
        confirmpassword: "",
      },
      showError: false,
      info:'',
    };
  },

  methods: {
    async register() {
      try {
        await auth.register(
          this.form.name,
          this.form.lastname,
          this.form.email,
          this.form.password,
          this.form.confirmpassword
        ).then(Response>(this.info=Response));
        console.log(this.info);
      } catch (error) {
        console.log(error);
        this.showError = true;
      }
    },
  },
};
</script>
