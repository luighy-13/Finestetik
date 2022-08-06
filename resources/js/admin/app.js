
import Vue from 'vue'
import App from './App.vue'
import router from './router/router.js'

import VueAxios from "vue-axios";
import axios from "axios";

import ElementUI from "element-ui";
import locale from "element-ui/lib/locale/lang/es";
import 'element-ui/lib/theme-chalk/index.css';

import btn_validator from  './tool_box/modal_active/modal_active.vue'

Vue.use(ElementUI, { locale });

Vue.use(VueAxios, axios);

axios.defaults.baseURL = window.location.protocol+'//' + window.location.hostname + ':' + window.location.port + '/api/';

Vue.component('btn-validator',btn_validator );

Vue.config.productionTip = false

Vue.router = router

Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
 });

new Vue(Vue.util.extend({ router }, App)).$mount("#app");
