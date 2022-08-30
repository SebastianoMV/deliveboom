// importo Vue e VueRouter
import Vue from "vue";
import VueRouter from "vue-router";

// dico a Vue di usare VueRouter
Vue.use(VueRouter);

// importo i componenti
import HomeComp from "./components/pages/HomeComp";

const router = new VueRouter({
    mode: "history",
    routes: [{
        path: "/",
        name: "home",
        component: HomeComp,
    }, ],
});

export default router;