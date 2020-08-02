<template>
  <v-app>
      <v-row>
        <v-col
          cols="12"
          sm="4"
          md="4"
          xs="12"
          class="login"
        >
          <div class="titulo">
            Hola mundo
          </div>
          <div class="contenido">
            <v-form >
            <v-text-field prepend-inner-icon="mdi-account-box" ref="form" label="Username">
            </v-text-field>
            <v-text-field prepend-inner-icon="mdi-key" ref="form" label="Password">
            </v-text-field>
            <center>
              <v-btn large color="primary">SIGN IN</v-btn>
            </center>
          </v-form>
          </div>
        </v-col>
      </v-row>
  </v-app>
</template>

<script>

</script>
<style>
.login {
  margin-left: auto;
  margin-right: auto;
}
.titulo {
  background: #1976d2;
  color: #ffffff;
  font-size: 25px;
  height: 100px;
  text-align: center;
  line-height: 100px;
}
.contenido {
  background: #ffffff;
}
</style>