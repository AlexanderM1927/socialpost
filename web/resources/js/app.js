
require('./bootstrap');

window.Vue = require('vue');


Vue.component('home', require('./components/home.vue').default);
Vue.component('navbar', require('./components/navbar.vue').default);
Vue.component('create', require('./components/posts/create.vue').default);
Vue.component('myposts', require('./components/posts/myPosts.vue').default);
Vue.component('show', require('./components/posts/show.vue').default);
Vue.component('login', require('./components/login.vue').default);
Vue.component('register', require('./components/register.vue').default);



import Vuetify from 'vuetify';

Vue.use(Vuetify);
const app = new Vue({
    el: '#v-app',
    vuetify: new Vuetify()
});