<template>
    <header>
        <nav>
            <div class="page-title">
                <img class="logoNav" src="../../assets/logo_cf.png"/>
            </div>
            <ul class="list-item">
                <li v-bind:class="[pageName === 'home' ? 'active' : '']"><a href="/">Home</a></li>
                <li v-bind:class="[pageName === 'solde' ? 'active' : '']"><a href="/solde">Solde</a></li>
                <li v-if="!isLoggedIn" v-bind:class="[pageName === 'login' ? 'login' : 'login']"><a href="/login">Sign in</a></li>
                <li v-else @click.prevent="logout" v-bind:class="[pageName === 'logout' ? 'logout' : 'logout']"><a>Logout</a></li>
            </ul>
        </nav>
    </header>
</template>

<script>
import store from "../store"
import axios from "axios";
export default {
    name: "Navbar",
    props: {
        pageName: String,
    },
    computed: {
        isLoggedIn() {
            return store.state.user.isAuthenticated
        }
    },
    methods: {
        async logout() {
            await axios.post("api/auth/logout")
            await store.dispatch('setIsAuthenticated', false)
        }
    }
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";

nav {
    display: flex;
    justify-content: space-between;
    height: 90px;
    align-items: center;
    padding: 0 100px;

    .page-title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-weight: 700;
        font-size: 30px;

        .logoNav {
            height: 80px;
        }
    }

    .list-item {
        display: flex;
        align-items: center;

        .login {
            display: flex;
            justify-content: center;
            align-items: center;
            text-transform: uppercase;
            background: rgba(200, 254, 199, 0.9);
            color: black;
            letter-spacing: 1px;
            font-weight: 500;
            font-size: 12px;
            line-height: 15px;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            height: 40px;
            margin-left: 30px;
        }

        .logout {
            display: flex;
            justify-content: center;
            align-items: center;
            text-transform: uppercase;
            background: rgba(200, 254, 199, 0.9);
            color: black;
            letter-spacing: 1px;
            font-weight: 500;
            font-size: 12px;
            line-height: 15px;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            height: 40px;
            margin-left: 30px;
            cursor: pointer;
        }

        .active {
            color: $green-general;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
            font-size: 12px;
            line-height: 15px;
            padding: 0.5rem 1rem;
            background-color: hsla(0,0%,100%,.09);
            border-radius: 0.375rem;
        }

        li a {
            text-decoration: none;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 800;
            font-size: 12px;
            line-height: 15px;
            padding: 0.5rem 1rem;
        }
    }
}
</style>
