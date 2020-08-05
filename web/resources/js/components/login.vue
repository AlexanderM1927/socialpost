<template>
  <v-app class="purple lighten-4">
      <v-container>
        <v-layout row justify-center>
          <v-flex xs11 sm5 md5 >
            <v-card tile >
              <v-toolbar flat color="purple darken-2 white--text ">
                <h1>SIGN IN</h1>
                <template >
                  <v-btn
                    color="purple lighten-1 white--text"
                    dark
                    small
                    absolute
                    bottom
                    right
                    fab
                  >
                    <v-icon>mdi-plus</v-icon>
                  </v-btn>
                </template>
              </v-toolbar>
              <v-form class="white px-5 py-6">
                  <v-text-field v-model="user.email" prepend-inner-icon="mdi-account-box purple lighten-1" ref="form" label="Email">
                  </v-text-field>
                  <v-text-field v-model="user.password" prepend-inner-icon="mdi-key purple lighten-1" ref="form" label="Password">
                  </v-text-field>
                  <v-btn @click="login" block color="purple lighten-1 white--text">SIGN IN</v-btn>
              </v-form>
              <v-footer class=" white center--text">
                <v-spacer></v-spacer>
                <a class="grey--text" href="">Forgot your Password?</a>
                <v-spacer></v-spacer>
              </v-footer>
            </v-card>   
          </v-flex>
        </v-layout>
      </v-container>
  </v-app>
</template>

<script>
export default {
  data () {
    return {
        user: {}
    }
  },
  methods:{
    abrir () {
      location.href="/home"
    },
    async login () {
        try {
            const p = await axios.post('login', this.user)
        } catch (error) {
            console.log(error)
        }
    }
  }
}
</script>