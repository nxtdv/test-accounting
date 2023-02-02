<template>
    <div class="navbar-container">
        <router-link class="return-container" :to="{name: 'home'}">
            <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.33331 1.33331L1.66665 7.99998L8.33331 14.6666" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Paramètres</span>
        </router-link>

        <div class="orga-container">
            <div class="orga-title-container">
                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 11L10 17L1 11M19 7L10 13L1 7L10 1L19 7Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Organisation</span>
            </div>
            <ul>
                <li><a>Général</a></li>
                <li><a>Préqualifications</a></li>
                <li><a>Equipes</a></li>
                <li><a>Abonnement</a></li>
            </ul>
        </div>
        <div class="user-container">
            <div class="user-title-container">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.2166 17.3323C13.9349 15.9008 12.0727 15 10 15C7.92734 15 6.06492 15.9008 4.7832 17.3323M10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10C19 14.9706 14.9706 19 10 19ZM10 12C8.34315 12 7 10.6569 7 9C7 7.34315 8.34315 6 10 6C11.6569 6 13 7.34315 13 9C13 10.6569 11.6569 12 10 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Mon compte</span>
            </div>
            <ul>
                <li><router-link :to="{name: 'settings.profile'}">Mon Profil</router-link></li>
                <li><router-link :to="{name: 'settings.security'}">Sécurité</router-link></li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "SettingsNavbar",
}
</script>

<style lang="scss" scoped>
.navbar-container {
    width: 350px;
    padding: 2.5rem 2.5rem;

    .return-container {
        display: flex;
        align-items: center;

        svg {
            width: 16px;
            height: 16px;
        }

        span {
            font-weight: 800;
            font-size: 23px;
            margin-left: 10px;
        }
    }

    .orga-container {
        margin-top: 27px;

        .orga-title-container {
            display: flex;
            align-items: center;

            svg {
                width: 15px;
                height: 15px;
            }

            span {
                font-family: 'Poppins', sans-serif;
                font-weight: 600;
                font-size: 17px;
                margin-left: 10px;
                color: #C8FEC7;
            }
        }

        ul {
            padding-left: 24.5px;

            li {
                display: flex;
                align-items: center;
                height: 40px;
                //padding: 0.5rem 1rem;
                //background-color: hsla(0deg, 0%, 100%, 0.09);
                //border-radius: 0.375rem;

                a {
                    //padding-left: 10px;
                    text-decoration: none;
                    font-size: 15px;
                    font-weight: 800;
                }.router-link-active {
                     color: #ff0000;
                 }
            }
        }
    }

    .user-container {
        margin-top: 50px;

        .user-title-container {
            display: flex;
            align-items: center;

            svg {
                width: 15px;
                height: 15px;
            }

            span {
                font-family: 'Poppins', sans-serif;
                font-weight: 600;
                font-size: 17px;
                margin-left: 10px;
                color: #C8FEC7;
            }
        }

        //ul {
        //    padding-left: 14.5px;
        //
        //    li {
        //        display: flex;
        //        align-items: center;
        //        height: 40px;
        //        //padding: 0.5rem 1rem;
        //        background-color: hsla(0deg, 0%, 100%, 0.09);
        //        border-radius: 0.375rem;
        //
        //        a {
        //            padding-left: 10px;
        //            text-decoration: none;
        //            font-size: 15px;
        //            font-weight: 800;
        //        }
        //    }
        //}

        ul {
            padding-left: 24.5px;

            li {
                display: flex;
                align-items: center;
                height: 40px;
                //padding: 0.5rem 1rem;
                //background-color: hsla(0deg, 0%, 100%, 0.09);
                //border-radius: 0.375rem;

                a {
                    //padding-left: 10px;
                    text-decoration: none;
                    font-size: 15px;
                    font-weight: 800;
                }
            }
        }

        .active {
            ul {
                padding-left: 14.5px;
            }
        }
    }
}
</style>
