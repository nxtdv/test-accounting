import { createStore } from "vuex";

const store = createStore({
    state: {
        user: {
            isAuthenticated: false,
            data: []
        },
    },
    mutations: {
        'IS_AUTHENTICATED': (state, isAuthenticated) => {
            state.user.isAuthenticated = isAuthenticated;
        }
    },
    actions: {
        setIsAuthenticated({ commit, state },isAuthenticated) {
            store.commit("IS_AUTHENTICATED", isAuthenticated)
            const user = JSON.stringify(state.user)
            localStorage.setItem("user", user)
        }
    }
})

const serialisedUser = localStorage.getItem("user")

if (serialisedUser) {
    const user = JSON.parse(serialisedUser)
    store.dispatch("setIsAuthenticated", user.isAuthenticated)
}

export default store;
