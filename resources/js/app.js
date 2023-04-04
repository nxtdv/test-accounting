require('./bootstrap');

import { createApp } from "vue"
import store from "./store";
import router from './router';
import home from './views/home.vue';
import solde from './views/solde.vue';
import login from './views/login.vue';
import register from './views/register.vue';

createApp({
    components: {
        home,
        solde,
        login,
        register
    }
}).use(router).use(store).mount('#app')
