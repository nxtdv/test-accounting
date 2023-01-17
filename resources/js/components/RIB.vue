<template>
    <div class="home_container">
        <div class="title_rib">RIB</div>
        <div class="input_container">
            <div class="rib_input">
                <span>Veuillez renseigner un RIB.</span>
                <input :style="inputArea ? { 'border': '2px solid rgba(200, 254, 199,.50)' } : { 'border': 'none' }" class="box" v-on:keydown="regex = false" type="search" v-model="inputArea" placeholder="Rentrer un RIB">
            </div>

            <Period :min-date="minDate" :max-date="maxDate"></Period>

            <button
                :style="inputArea && minDate && maxDate ? { 'background': 'rgba(200, 254, 199,.90)', 'color': 'black' } : { 'border': 'none' }"
                :disabled="!(inputArea && minDate && maxDate)"
                type="submit" value="Submit" @click.prevent="submitForm" class="search_button">Search</button>
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
    props: {
        inputArea: String,
        regex: Boolean,
        minDate: String,
        maxDate: String,
        submitForm: Function
    }
}
</script>

<style scoped>
.home_container {
    display: flex;
    flex-direction: column;
}

.home_container .title_rib {
    font-weight: 700;
    font-size: 40px;
    padding: 0 0 0 100px;
}

.home_container .input_container {
    padding: 0 100px 0 100px;
}

.home_container .input_container .rib_input {
    display: flex;
    flex-direction: column;
    margin: 50px 0 34px
}

.home_container .input_container .rib_input span {
    font-weight: 800;
    padding: 0 0 23px;
}

.home_container .input_container .rib_input input {
    outline: none 0 !important;
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

.home_container .input_container input:focus {
    --tw-border-opacity: 1;
    border-color: rgb(246 184 62/var(--tw-border-opacity));
    outline: 2px solid transparent;
    outline-offset: 2px;
}

.search_button {
    color: #C8FEC7;
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
</style>
