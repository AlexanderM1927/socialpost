require('./bootstrap');
window.Vue = require('vue');
Vue.component('home', require('./components/home.vue').default);
import Vuetify from 'vuetify';
Vue.use(Vuetify);