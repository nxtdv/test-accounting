<template>
    <div @click.self="isOpenDropdown=false" class="menu-item">
        <div @click="isOpenDropdown = !isOpenDropdown" :style="isOpened" class="btn-container">
            <a class="button-title" href="#">
                {{ title }}
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="10" viewBox="0 0 16 10" fill="none">
                <path d="M14.6667 1.66669L8.00002 8.33335L1.33335 1.66669" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <transition name="fade" appear>
            <ul class="sub-menu" v-if="isOpenDropdown">
                <li v-for="(item, i) in items" :key="i">
                    <router-link :to="item.link">{{ item.title }}</router-link>
                </li>
                <hr/>
                <button @click.prevent="logout" class="button" type="submit">Logout</button>
            </ul>
        </transition>
    </div>
</template>

<script>
import axios from "axios";
import store from "../store";

export default {
    name: 'Dropdown',
    props: {
        title: String,
        items: Array
    },
    data () {
        return {
            isOpenDropdown: false
        }
    },
    computed: {
        isOpened() {
            return this.isOpen ? { 'background': 'hsla(0,0%,100%,.09)', 'color': 'white' } : null // { 'background': 'rgba(200, 254, 199, 0.082)', 'color': 'white' }
        }
    },
    methods: {
        async logout() {
            await axios.post("api/auth/logout")
            await store.dispatch('setIsAuthenticated',  {"isAuthenticated": false, "User": {}})
            this.$router.push({name: "login"})
        }
    }
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";

.menu-item {
    margin-left: 5px;
    .btn-container {
        display: flex;
        align-items: center;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 800;
        font-size: 12px;
        line-height: 15px;
        padding: 0.5rem 1rem;
        //background-color: hsla(0,0%,100%,.09);
        border-radius: 0.375rem;

        .button-title {
            //display: flex;
            //justify-content: center;
            //align-items: center;
            //text-transform: uppercase;
            //letter-spacing: 1px;
            //font-weight: 800;
            //font-size: 12px;
            //line-height: 15px;
            //padding: 0.5rem 1rem;
            //border-radius: 0.375rem;
            //height: 40px;
            //margin-left: 30px;
            //cursor: pointer;
            //color: $green-general;
        }

        svg {
            width: 13px;
            height: 13px;
            margin-left: 10px;
        }
    }

    .sub-menu {
        display: flex;
        flex-direction: column;
        position: absolute;
        background-color: hsla(0deg, 0%, 100%, 0.09);
        border: 1px solid rgba(200, 254, 199, 0.082);
        box-shadow: rgba(200, 254, 199, 0.9);
        border-radius: 6px;
        right: 0;
        width: 230px;
        z-index: 100;
        margin-top: 10px;
        margin-right: 100px;
        padding: 0.7rem;

        li a {
                text-decoration: none;
                letter-spacing: 1px;
                font-size: 12px;
                line-height: 15px;
            }

        hr {
            display: block;
            height: 1px;
            border: 0;
            border-top: 1px solid rgba(200, 254, 199, 0.082);
            margin: 0.5em 0;
            padding: 0;
        }

        .button {
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 800;
            font-size: 12px;
            line-height: 15px;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            height: 100%;
            cursor: pointer;
            background: rgba(200, 254, 199, 0.9);
            color: black;
        }
    }
}

.fade-enter-active,
.fade-leave-active {
    transition: all .5s ease-out;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
Footer
