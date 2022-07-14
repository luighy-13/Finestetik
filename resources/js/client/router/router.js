import Vue from "vue";
import Router from 'vue-router';

import home from "../views/home/home.vue";
import sing_up from '../views/sing_up/sing_up.vue'
import surgery from '../views/surgery/surgery.vue'
import credit_card from '../views/credit_card/credit_card.vue';
import invoice from '../views/invoice/invoice.vue'
import login from '../views/login/login.vue'

Vue.use(Router);
const routes = [

    {
        path: "/",
        component: home,

        children:[
            {
                path: "/login",
                component: login,
                meta: {
                    auth: false
                },
            },
            {
                path: "/sing-up",
                component: sing_up,
                meta: {
                    auth: false
                },
            },
            {
                path: "/cirugia",
                component: surgery,
                meta: {
                    auth: true
                },
            },
            {
                path: "/tarjetas",
                component: credit_card,
                meta: {
                    auth: true
                },
            },
            {
                path: "/recibos",
                component: invoice,
                meta: {
                    auth: true
                },
            },
        ]
    },


];
const router = new Router({routes : routes});


export default router
