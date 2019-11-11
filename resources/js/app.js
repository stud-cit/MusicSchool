require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';
import router from './router';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

import HeaderComponent from './components/HeaderComponent';

Vue.config.productionTip = false

Vue.use(BootstrapVue);

const app = new Vue({
    el: '#app',
    components: {
        HeaderComponent
    },
    router
});