
import Vue from 'vue'
import App from './App.vue'
import router from './router/router.js'

import VueAxios from "vue-axios";
import axios from "axios";

Vue.use(VueAxios, axios);

axios.defaults.baseURL = window.location.protocol+'//' + window.location.hostname + ':' + window.location.port + '/api/';


Vue.config.productionTip = false

Vue.router = router

Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
 });

new Vue(Vue.util.extend({ router }, App)).$mount("#app");
