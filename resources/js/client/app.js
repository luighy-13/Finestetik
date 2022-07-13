
import Vue from 'vue'
import App from './App.vue'
import router from './router/router.js'


import VueAxios from "vue-axios";
import axios from "axios";

Vue.use(VueAxios, axios);

axios.defaults.baseURL = window.location.protocol+'//' + window.location.hostname + ':' + window.location.port + '/api/';

Vue.config.productionTip = false
new Vue({
    router,
    render: h => h(App)
}).$mount("#app");
