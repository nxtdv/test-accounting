<template>
    <div class="profile-container">
        <div class="header-container">
            <span class="title">Mon profil</span>
            <span class="subtitle">Gérez les paramètres de votre profil</span>
        </div>

        <div class="image-container">
            <span class="title">Votre photo de profil</span>

            <div class="form-container">
                <div class="image">

                </div>

                <div class="image-buttons">
                    <div class="change-button">
                        <span>Changer la photo</span>
                    </div>
                    <div>
                        <img src="" alt="ICON">
                        <span>Supprimer</span>
                    </div>
                </div>
            </div>

            <span>Ajoutez votre photo. La taille recommandée est 256x256px</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "profile",
}
</script>

<style lang="scss" scoped>
    .profile-container {
        display: flex;
        flex-direction: column;
        padding: 100px 200px;

        .header-container {
            display: flex;
            flex-direction: column;

            .title {
                font-weight: 800;
                font-size: 30px;
            }

            .subtitle {
                font-size: 17px;
                color: #C8FEC7;
            }
        }

        .image-container {
            display: flex;
            flex-direction: column;
            margin-top: 110px;

            .title {
                font-weight: 800;
                font-size: 22px;
            }

            .form-container {
                display: flex;
                .image {
                    width: 150px;
                    height: 150px;
                    border-radius: 100%;
                    background-color: #0a58ca;
                }

                .image-buttons {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    margin-left: 30px;

                    .change-button {
                        color: #000000;
                        background-color: #C8FEC7;
                        border-radius: 3px;
                        height: 40px;
                    }
                }
            }


        }
    }
</style>
