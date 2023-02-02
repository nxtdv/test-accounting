<template>
    <div class="settings-container">
<!--        <SettingsNavbar></SettingsNavbar>-->
        <div class="yolerap2">security</div>
    </div>
</template>

<script>
import SettingsNavbar from "../../components/SettingsNavbar.vue";
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

        .yolerap2 {
            //background-color: #0a58ca;
            width: 100%;
        }
    }
</style>
