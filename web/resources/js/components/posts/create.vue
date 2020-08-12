<template>
     <v-app class="grey lighten-2">
        <v-container>
            <v-layout row justify-center>
                <v-flex xs11 sm7 md7 >
                    <v-card tile >
                        <v-toolbar flat dark color="#385F73">
                            <h2>{{user}}</h2>
                        </v-toolbar>
                        <v-form @submit="save" class="white px-5 py-6">
                            <v-textarea
                                name="content"
                                v-model="post.content"
                                ref="form" 
                                label="New Post">
                            </v-textarea>
                            <v-btn  @click="save" color="blue-grey white--text">SUBMIT</v-btn>
                        </v-form>
                    </v-card>  
                </v-flex>
            </v-layout>
        </v-container>        
    </v-app>
</template>

<script>
let user= document.head.querySelector('meta[name="user"]');

export default ({
    data(){
    return{
         post:{}  
    }
  },
  computed:{
    user(){
      return JSON.parse(user.content).name;
    }
  }, 
  methods:{
      async save () {
           axios.post('posts', this.post)
          .then(function(response){
            alert('Post created succesfully');
            location.href="/showPosts";
        })
        .catch(function(error){
            alert('error')
        });
      }
  }
})
</script>