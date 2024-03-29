<template>
    <div>
        <navbar page-name="register"></navbar>
        <div class="register-container">
            <span class="title-register">Hi, Welcome.</span>
            <span class="subtitle-register">Please enter your details.</span>
            <div class="input-container">
                <div class="register-input">
                    <div class="name-inputs">
                        <div class="details-container">
                            <span>Nom</span>
                            <input :style="verificationIsEmptyInputLastName" v-on:keydown="regex = false" type="search" v-model="inputAreaLastname" placeholder="Rentrer votre Nom">
                        </div>

                        <div class="details-container">
                            <span>Prénom</span>
                            <input :style="verificationIsEmptyInputFirstName" v-on:keydown="regex = false" type="search" v-model="inputAreaFirstname" placeholder="Rentrer votre Prénom">
                        </div>
                    </div>

                    <span>Email</span>
                    <input :style="verificationIsEmptyInputEmail" v-on:keydown="regex = false" type="search" v-model="inputAreaEmail" placeholder="Rentrer votre Email">

                    <span>Mot de passe</span>
                    <input :style="verificationIsEmptyInputPassword" v-on:keydown="regex = false" type="password" v-model="inputAreaPassword" placeholder="Créer un mot de passe">
                </div>

                <button
                    :style="verificationIfExists"
                    :disabled="verificationIfTrue"
                    type="submit" value="Submit" @click.prevent="submitForm" class="sign-up-button">Sign up</button>

                <div v-for="(value, key, index) in errors">
                    <span style="color: rgb(235, 87, 87)" v-for="(data, key, index) in value">{{ data }}</span>
                </div>

                <span class="redirect">Vous avez un compte? <a href="/login" class="login-redirect">Sign in</a></span>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import axios from "axios";
import store from "../store";

export default {
    name: "register",
    components: {
        Navbar
    },
    data() {
        return {
            isLogout: false,
            regex: false,
            inputAreaFirstname: "Bon",
            inputAreaLastname: "Jean",
            inputAreaEmail: "bon@example.org",
            inputAreaPassword: "password",
            defaultBorder: { 'border': '2px solid rgba(200, 254, 199,.50)' },
            errors: {}
        }
    },
    computed: {
        verificationIsEmptyInputLastName() {
            return this.inputAreaLastname ? this.defaultBorder : null;
        },
        verificationIsEmptyInputFirstName() {
            return this.inputAreaFirstname ? this.defaultBorder : null;
        },
        verificationIsEmptyInputEmail() {
            return this.inputAreaEmail ? this.defaultBorder : null;
        },
        verificationIsEmptyInputPassword() {
            return this.inputAreaPassword ? this.defaultBorder : null;
        },
        verificationIfExists() {
            return this.inputAreaEmail && this.inputAreaPassword && this.inputAreaFirstname && this.inputAreaLastname ? { 'background': 'rgba(200, 254, 199,.90)', 'color': 'black' } : null;
        },
        verificationIfTrue() {
            return !(this.inputAreaEmail && this.inputAreaPassword && this.inputAreaFirstname && this.inputAreaLastname);
        }
    },
    methods: {
        async submitForm() {
            if (!this.inputAreaEmail && this.inputAreaPassword && this.inputAreaFirstname && this.inputAreaLastname ) {
                return (this.regex = true)
            }

            const response = await axios.post(`api/auth/register`, {
                firstname: this.inputAreaFirstname,
                lastname: this.inputAreaLastname,
                email: this.inputAreaEmail,
                password: this.inputAreaPassword
            });

            const { data } = response

            if (data.status === 201) {
                await store.dispatch('setIsAuthenticated', true)
                this.$router.push({name: "home"})
            } else if (data.status === 422)  {
                this.errors = data.error;
            }
        },
    }
}
</script>

<style lang="scss" scoped>
@import "resources/sass/_variables.scss";

.register-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 50px;

    .title-register {
        display: flex;
        justify-content: center;
        font-weight: 700;
        font-size: 40px;
        width: 439px;
    }

    .subtitle-register {
        color: rgba(200, 254, 199, 0.9);
    }

    .input-container {
        display: flex;
        align-items: center;
        flex-direction: column;

        .register-input {
            display: flex;
            flex-direction: column;
            margin-top: 50px;

            span {
                font-weight: 800;
                padding-bottom: 15px;
                font-size: 15px;
            }

            input {
                outline: none 0;
                color: white;
                font-size: 13px;
                line-height: 17px;
                padding: 0.75rem 2.5rem 0.75rem 1rem;
                background-color: hsla(0, 0%, 100%, .05);
                border: 1px solid hsla(0, 0%, 100%, .09);
                border-radius: 0.25rem;
                width: 439px;
                height: 44px;
                margin-bottom: 23px;
            }::placeholder {
                font-weight: 600;
            }

            .name-inputs {
                display: flex;
                justify-content: space-between;

                .details-container {
                    display: flex;
                    flex-direction: column;
                }

                input {
                    outline: none 0;
                    color: white;
                    font-size: 13px;
                    line-height: 17px;
                    padding: 0.75rem 2.5rem 0.75rem 1rem;
                    background-color: hsla(0, 0%, 100%, .05);
                    border: 1px solid hsla(0, 0%, 100%, .09);
                    border-radius: 0.25rem;
                    width: 204px;
                    height: 44px;
                }
            }
        }

        .sign-up-button {
            color: $green-general;
            background: rgba(200, 254, 199, .082);
            border-color: transparent;
            margin-top: 30px;
            cursor: pointer;
            font-weight: 600;
            font-size: .875rem;
            line-height: 1.25rem;
            letter-spacing: .0025em;
            padding-left: 1rem;
            padding-right: 1rem;
            height: 3rem;
            width: 439px;
            border-radius: 0.25rem;
        }

        .redirect {
            font-weight: 600;
            font-size: 14px;
            margin-top: 20px;

            .login-redirect {
                color: rgba(200, 254, 199, 0.9);
            }
        }
    }
}
</style>
