<template>
    <div class="settings-container">
        <SettingsNavbar></SettingsNavbar>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import SettingsNavbar from "../components/SettingsNavbar.vue";
export default {
    name: "settings",
    components: {
        SettingsNavbar
    }
}
</script>

<style lang="scss" scoped>
    .settings-container {
        display: flex;
        color: white;

        .container {
            width: 100%;
        }
    }
</style>
