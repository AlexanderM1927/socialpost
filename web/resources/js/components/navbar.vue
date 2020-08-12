<template> 
    <nav>
      <v-toolbar flat class="grey lighten-4">
        <v-app-bar-nav-icon class="grey--text" @click="drawer = !drawer">
        </v-app-bar-nav-icon>
        <v-toolbar-title class="text-uppercase grey--text">
          <span class="font-weight-light">Social</span>
          <span>Test</span>
        </v-toolbar-title>
        <v-spacer></v-spacer>
                
				<v-btn v-if="user=='Vacio'" @click="LogIn" text color="grey">
          <span>LogIn</span>
          <v-icon>mdi-account-arrow-left</v-icon>
        </v-btn>
        			
				<v-btn v-else text color="grey" @click="logout">
          <span>LogOut</span>
          <v-icon>mdi-exit-to-app</v-icon>
        </v-btn>
        
      </v-toolbar>
      <v-navigation-drawer app v-model="drawer" class="blue-grey darken-2">
        <v-list nav>
          <v-subheader class="white--text">Menu</v-subheader>

          <v-list-item-group v-if="user!='Vacio'">
            <v-list-item  v-for="link in links" :key="link.text" @click="toRoute(link.route)">
              <v-list-item-icon>
                <v-icon class="white--text">{{link.icon}}</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title class="white--text">
                  {{link.text}}
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group> 

          <v-list-item-group v-else>
            <v-list-item @click="toRoute('home')">
              <v-list-item-icon>
                <v-icon class="white--text">mdi-home</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title class="white--text">
                  Home
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>

        </v-list>
      </v-navigation-drawer>
      
    </nav>
    
</template>
<script>
let user= document.head.querySelector('meta[name="user"]');
export default {
  data(){
    return{
      drawer:false,
      links:[
        {icon:'mdi-home', text:'Home', route:'/home'},
        {icon:'mdi-card-text-outline', text:'Posts', route:'/showPosts'},
        {icon:'mdi-badge-account-horizontal-outline', text:'My Posts', route:'/showMyPosts'},
        {icon:'mdi-file-document-edit-outline', text:'Create Post', route:'/createPost'}
      ]
    }
  },
  computed:{
    user(){
      return user.content;
    }
  },
  methods:{
    LogIn(){
      location.href="/login"
    },
    logout(){
      axios.post('logout').then((result) => {
      location.href="/home"
      })     
    },
    toRoute(route){
      location.href=route;
    },
  }
  
}
</script>