<template>
  <v-app class="grey lighten-2">
    <v-card
      max-width="400"
      class="mx-auto blue-grey lighten-2"
    >
      <v-container v-for="post in posts" :key="post.id">
        <v-row dense>
          <v-col cols="12">
            <v-card
              color="#385F73"
              dark
            >
              <v-card-title class="headline">{{post.author}}</v-card-title>
              <v-card-subtitle>{{post.content}}</v-card-subtitle>
              <p class="text-caption grey--text">
                  {{post.updated_at}}
              </p>
            </v-card>
          </v-col>    
        </v-row>
      </v-container>
    </v-card>
  </v-app>
</template>


<script >
export default({
    data(){
        return{
            posts:{},
        }
    },
    created(){
        axios.get('/posts').then(res=>{
        this.posts = res.data;
        
        })
    }    
})
</script>