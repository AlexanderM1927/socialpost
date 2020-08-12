<template>
  <v-app class="grey lighten-2">
      <v-container>
        <v-layout row justify-center>
          <v-flex xs11 sm8 md7 >
            <v-card tile >
              <v-toolbar flat dark color="#385F73">
                <h1>SIGN IN</h1>
                <template >
                  <v-btn
                    @click="registerIndex"
                    color="blue-grey white--text"
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
                  <v-text-field 
                  v-model="user.email" 
                  prepend-inner-icon="mdi-account-box blue-grey--text lighten-1" 
                  ref="form" 
                  label="Email"
                  >
                  </v-text-field>
                  <v-text-field v-model="user.password" 
                  prepend-inner-icon="mdi-key blue-grey--text lighten-1" 
                  ref="form" label="Password"
                  type="password">
                  </v-text-field>
                  <v-btn @click="login" block color="blue-grey white--text">SIGN IN</v-btn>
              </v-form>
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
    async login () {
      await axios.post('/login', this.user)
      .then((res) =>{
          const r = res;
          if(r.data.auth){
            location.href="/showPosts"
          }else{
            alert('unregistered user')
          }
        })        
    },
    async registerIndex(){
         location.href="/register"
    }
  }
}
</script>