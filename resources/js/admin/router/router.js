import Vue from "vue";
import Router from 'vue-router';


// // just do this:
// import Vue from 'vue'; //import again even though you already imported it
// import Router from 'vue-router'; // and this is where difference comes in
import dashboard from "../views/dashboard/dashboard.vue";
import display from "../views/display/display.vue";
import users from "../views/system/Users/users.vue";
import roles from "../views/system/rols/rols.vue";
import access from "../views/system/access_rols/access_rols.vue"

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
            },
            {
                path: '/sistema/usuarios',
                component: users
            },
            {
                path: '/sistema/roles',
                component: roles
            },
            {
                path: '/sistema/permisos',
                component: access
            }
        ]
    },
];
const router = new Router({routes : routes});

// //then you're router to export as follows
// const router = new Router({routes : routes});

export default router
