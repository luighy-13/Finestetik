import Vue from "vue";
import Router from 'vue-router';


// // just do this:
// import Vue from 'vue'; //import again even though you already imported it
// import Router from 'vue-router'; // and this is where difference comes in
import dashboard from "../views/dashboard/dashboard.vue";
import display from "../views/display/display.vue"

Vue.use(Router);
const routes = [
    {
        path: "/login",
        component: dashboard
    },
    {
        path: "/",
        component: dashboard,
        children:[
            {
                path: '/monitor-de-ventas',
                component: display
            }
        ]
    },
];
const router = new Router({routes : routes});

// //then you're router to export as follows
// const router = new Router({routes : routes});

export default router
