import { createRouter, createWebHistory } from "vue-router";
import home from "../views/home.vue";
import solde from "../views/solde.vue";
import login from "../views/login.vue";
import register from "../views/register.vue";
import settings from "../views/settings.vue";
import profile from "../views/settings/profile.vue";
import security from "../views/settings/security.vue";
import store from "../store";

const routes = [
    {
        path: "/",
        name: "home",
        component: home,
        meta: { requiresAuth: true }
    },
    {
        path: "/solde",
        name: "solde",
        component: solde,
        meta: { requiresAuth: true }
    },
    {
        path: "/settings",
        name: "settings",
        component: settings,
        meta: { requiresAuth: true },
        redirect: {
            name: "settings.profile"
        },
        children: [
            {
                path: "profile",
                component: profile,
                name: "settings.profile"
            },
            {
                path: "security",
                component: security,
                name: "settings.security"
            }
        ]
    },
    {
        path: "/login",
        name: "login",
        component: login,
        meta: { requiresAuth: false },
        beforeEnter: async (to, from, next) => {
            const isLoggedIn = store.state.user.isAuthenticated

            if (isLoggedIn) {
                return next("/");
            }
            next();
        },
    },
    {
        path: "/register",
        name: "register",
        component: register,
        meta: { requiresAuth: false },
        beforeEnter: async (to, from, next) => {
            const isLoggedIn = store.state.user.isAuthenticated

            if (isLoggedIn) {
                return next("/");
            }
            next();
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.isAuthenticated) {
        next({name: "login"});
    } else {
        next();
    }
});

export default router;
