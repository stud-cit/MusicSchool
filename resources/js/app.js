require('./bootstrap');

window.Vue = require("vue");

import BootstrapVue from "bootstrap-vue";
import router from "./router";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

import HeaderComponent from "./components/HeaderComponent";
import FooterComponent from "./components/FooterComponent";
import PageTitleComponent from "./components/PageTitleComponent";

Vue.config.productionTip = false;

Vue.use(BootstrapVue);

Vue.component("page-title", PageTitleComponent);

const app = new Vue({
    el: "#app",
    components: {
        HeaderComponent,
        FooterComponent
    },
    router
});
