window.Vue = require("vue");
window.axios = require("axios");

require("./bootstrap");

import App from "./App.vue";
import router from "./routes";
import 'animate.css';



const app = new Vue({
    el: "#app",
    router,
    render: (h) => h(App),
});



