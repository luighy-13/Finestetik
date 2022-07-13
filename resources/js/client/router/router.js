import Vue from "vue";
import Router from 'vue-router';


// // just do this:
// import Vue from 'vue'; //import again even though you already imported it
// import Router from 'vue-router'; // and this is where difference comes in
import home from "../views/home/home.vue";
import sing_up from '../views/sing_up/sing_up.vue'
import surgery from '../views/surgery/surgery.vue'
import credit_card from '../views/credit_card/credit_card.vue';
import invoice from '../views/invoice/invoice.vue'

Vue.use(Router);
const routes = [
    {
        path: "/login",
        component: home
    },
    {
        path: "/",
        component: home,
        children:[
            {
                path: "/sing-up", 
                component: sing_up
            },
            {
                path: "/cirugia", 
                component: surgery
            },
            {
                path: "/tarjetas", 
                component: credit_card
            },
            {
                path: "/recibos", 
                component: invoice
            },
        ]
    },
    

];
const router = new Router({routes : routes});

// //then you're router to export as follows
// const router = new Router({routes : routes});

export default router
