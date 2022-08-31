// importo Vue e VueRouter
import Vue from "vue";
import VueRouter from "vue-router";

// dico a Vue di usare VueRouter
Vue.use(VueRouter);

// importo i componenti
import HomeComp from "./components/pages/HomeComp";
import CartComp from "./components/pages/CartComp";
import CheckoutComp from "./components/pages/CheckoutComp";

const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: "active",
    routes: [{
            path: "/",
            name: "home",
            component: HomeComp,
        },
        {
            path: "/carrello",
            name: "cart",
            component: CartComp,
        },
        {
            path: "/checkout",
            name: "checkout",
            component: CheckoutComp,
        },
    ],
});

export default router;
