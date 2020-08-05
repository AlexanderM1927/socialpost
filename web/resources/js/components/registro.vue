<template>

    <v-app class="purple lighten-4">
        <v-container>
            <v-layout row justify-center>
                <v-flex xs11 sm5 md5 >
                    <v-card tile >
                        <v-toolbar flat color="purple darken-2 white--text ">
                            <h1>SIGN UP</h1>
                        </v-toolbar>
                        <v-form class="white px-5 py-6">
                            <v-text-field 
                                prepend-inner-icon="mdi-account-box purple lighten-1" 
                                ref="form" 
                                label="Username">
                            </v-text-field>
                            <v-text-field 
                                prepend-inner-icon="mdi-mail purple lighten-1" 
                                ref="form" 
                                label="Email">
                            </v-text-field>
                            <v-text-field 
                                prepend-inner-icon="mdi-key purple lighten-1" 
                                ref="form" 
                                label="Password">
                            </v-text-field>
                            <v-text-field 
                                prepend-inner-icon="mdi-key purple lighten-1" 
                                ref="form" 
                                label="Confirm-Password">
                            </v-text-field>
                            <v-btn block color="purple lighten-1 white--text">SUBMIT</v-btn>
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
    }
  },
  methods:{
    abrir () {
      location.href="/home"
    },
    
  }
  
}
</script>