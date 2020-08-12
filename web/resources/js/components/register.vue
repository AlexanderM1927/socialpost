<template>

    <v-app class="grey lighten-2">
        <v-container>
            <v-layout row justify-center>
                <v-flex xs11 sm7 md8 >
                    <v-card tile >
                        <v-toolbar flat dark color="#385F73">
                            <h1>SIGN UP</h1>
                        </v-toolbar>
                        <v-form @submit="guardar" class="white px-5 py-6">
                            <v-text-field 
                                v-model="user.username"
                                prepend-inner-icon="mdi-account-box blue-grey--text lighten-1" 
                                ref="form" 
                                label="Username">
                            </v-text-field>
                            <v-text-field 
                                v-model="user.email"
                                prepend-inner-icon="mdi-mail blue-grey--text lighten-1" 
                                ref="form" 
                                type="email"
                                label="Email">
                            </v-text-field>
                            <v-text-field 
                                v-model="user.password"
                                prepend-inner-icon="mdi-key blue-grey--text lighten-1" 
                                ref="form" 
                                type="password"
                                label="Pasasword">
                            </v-text-field>
                            <v-text-field 
                                v-model="user.cpassword"
                                prepend-inner-icon="mdi-key blue-grey--text lighten-1" 
                                ref="form" 
                                type="password"
                                label="Confirm-Password">
                            </v-text-field>
                            <v-btn @click="guardar" block color="blue-grey white--text">SUBMIT</v-btn>
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
    async guardar () {
        axios.post('register', this.user)
        .then((res) =>{
          const r = res;
          if(r.data.auth){
              alert('registration completed')
              location.href="/showPosts"
          }
          if(r.data=="passdontmatch"){
              alert('passwords do not match')
          }
          if(r.data=="userexists"){
              alert('Email allready registered')
          }
        }).catch(function(error){
            alert("All fields required")
        });        
    }
  }
}
</script>