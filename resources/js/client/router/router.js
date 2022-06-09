// just do this:
import Vue from 'vue'; //import again even though you already imported it
import Router from 'vue-router'; // and this is where difference comes in
import Home from "../views/home/home.vue";

Vue.use(Router);
const routes = [
    {
        path: "/",
        component: Home
    },
];

//then you're router to export as follows
const router = new Router({routes : routes});

export default router
