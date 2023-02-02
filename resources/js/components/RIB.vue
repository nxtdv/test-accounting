<template>
    <div class="home-container">
        <div class="title-rib">RIB</div>
        <div class="input-container">
            <div class="rib-input">
                <span>Veuillez renseigner un RIB.</span>
                <input :style="verificationIsEmptyInput" class="box" v-on:keydown="regex = false" type="text" v-model="this.$store.state.ribFrom.rib" placeholder="Rentrer un RIB">
            </div>

            <Period></Period>

            <div v-for="(value, key, index) in this.$store.state.ribFrom.error">
                <span style="color: rgb(235, 87, 87)" v-for="(data, key, index) in value">{{ data }}</span>
            </div>

            <button
                :style="verificationIfExists"
                :disabled="verificationIfTrue"
                type="submit" value="Submit" @click.prevent="submitForm" class="search-button">Search</button>
        </div>
    </div>
</template>

<script>
import Period from "./Period.vue";
export default {
    name: "RIB",
    components: {
        Period
    },
    computed: {
        verificationIsEmptyInput() {
            return this.$store.state.ribFrom.rib ? !isNaN(this.$store.state.ribFrom.rib) ? { 'border': '2px solid rgba(200, 254, 199,.50)' } : { 'border': '1px solid hsla(0,0%,100%,.09);' } : { 'border': '1px solid hsla(0,0%,100%,.09);' };
        },
        verificationIfExists() {
            return this.$store.state.ribFrom.rib && this.$store.state.ribFrom.minDate && this.$store.state.ribFrom.maxDate ? { 'background': 'rgba(200, 254, 199,.90)', 'color': 'black' } : { 'border': '1px solid hsla(0,0%,100%,.09);' };
        },
        verificationIfTrue() {
            return !(this.$store.state.ribFrom.rib && this.$store.state.ribFrom.minDate && this.$store.state.ribFrom.maxDate);
        },
    },
    props: {
        regex: Boolean,
        submitForm: Function
    }
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";

.home-container {
    display: flex;
    flex-direction: column;

    .title-rib {
        font-weight: 700;
        font-size: 40px;
        padding-left: 100px;
    }

    .input-container {
        padding: 0 100px;

        .rib-input {
            display: flex;
            flex-direction: column;
            margin: 50px 0 34px;

            span {
                font-weight: 800;
                padding-bottom: 23px;
            }

            input {
                outline: none 0;
                color: white;
                font-size: 14px;
                line-height: 17px;
                padding: 0.75rem 2.5rem 0.75rem 1rem;
                background-color: hsla(0,0%,100%,.05);
                border: 1px solid hsla(0,0%,100%,.09);
                border-radius: 0.25rem;
                width: 439px;
                height: 44px;
            }::placeholder {
                 font-weight: 600;
             }
        }

        input:focus {
            --tw-border-opacity: 1;
            border-color: rgb(246 184 62/var(--tw-border-opacity));
            outline: 2px solid transparent;
            outline-offset: 2px;
        }

        .search-button {
            color: $green-general;
            background: rgba(200, 254, 199,.082);
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
    }
}
</style>
