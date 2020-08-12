<template>
  <v-app class="grey lighten-2">
        <v-container v-for="post in posts" :key="post.id">
            <v-layout row justify-center>
                <v-flex xs11 sm7 md7 >
                    <v-card tile >
                        <v-toolbar flat dark color="#385F73">
                            <h2>{{user}}</h2>
                        </v-toolbar>
                        <v-form class="white px-5 py-6">
                            <v-textarea 
                                name="content"
                                v-model="post.content"
                                ref="form" 
                            >
                                {{post.content}}
                            </v-textarea>
                            <v-btn @click="update(post)" color="blue-grey white--text">UPDATE</v-btn>
                            <v-btn @click="deletePost(post)" color="blue-grey white--text">DELETE</v-btn>
                        </v-form>
                    </v-card>  
                </v-flex>
            </v-layout>
        </v-container>        
    </v-app>
</template>


<script >
let user= document.head.querySelector('meta[name="user"]');
export default({
    data(){
        return{
            posts:{},
        }
    },
    computed:{
    user(){
      return JSON.parse(user.content).name;
    }
  },
    created(){
        axios.get('/myPosts').then(res=>{
        this.posts = res.data;     
        })
    },
    methods:{
        async update(post){
            
            axios.put(`/posts/${post.id}`, post)
            .then(function(response){
                alert('Post updeated succesfully');
                location.href="/showPosts";
            })
            .catch(function(error){
                alert('error')
            });
        },

        async deletePost(post){
            const confirmation = confirm('Are you sure about deleting this post?');
            if(confirmation){
                axios.delete(`/posts/${post.id}`)
                .then(function(response){
                  alert('Post deleted succesfully');
                  location.href="/showPosts";
                })
                .catch(function(error){
                  alert('error')
                });
            }
            
        }
    }    
})
</script>