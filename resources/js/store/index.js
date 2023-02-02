import { createStore } from "vuex";
import modals from './modals'

const store = createStore({
    modules: {
        modals,
    },
    state: {
        user: {
            isAuthenticated: false,
            data: {}
        },
        ribFrom: {
            rib: null,
            minDate: null,
            maxDate: null,
            error: null
        },
    },
    mutations: {
        'IS_AUTHENTICATED': (state, isAuthenticated) => {
            state.user.isAuthenticated = isAuthenticated;
        },
        'ADD_DATA': (state, data) => {
            state.user.data = data;
        }
    },
    actions: {
        setIsAuthenticated({ commit, state }, data) {
            store.commit("IS_AUTHENTICATED", data.isAuthenticated)
            store.commit("ADD_DATA", data.User)
            const user = JSON.stringify(state.user)
            localStorage.setItem("user", user)
        },
    }
})

const serialisedUser = localStorage.getItem("user")

if (serialisedUser) {
    const user = JSON.parse(serialisedUser)
    store.dispatch("setIsAuthenticated", {"isAuthenticated": user.isAuthenticated, "User": user.data})
}

export default store;
