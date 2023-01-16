<template>
    <div class="homeContainer">
        <div class="titleRIB">RIB</div>
        <div class="inputContainer">
            <div class="ribInput">
                <span>Veuillez renseigner un RIB.</span>
                <input :style="inputArea ? { 'border': '2px solid rgba(200, 254, 199,.50)' } : { 'border': 'none' }" class="box" v-on:keydown="regex = false" type="search" v-model="inputArea" placeholder="Rentrer un RIB">
            </div>

            <div class="dateInput">
                <div class="minDate">
                    <span>Date minimum:</span>
                    <input :style="minDate ? { 'border': '2px solid rgba(200, 254, 199,.50)' } : { 'border': 'none' }" name="min-date" type="date" v-model="minDate">
                </div>
                <div class="maxDate">
                    <span>Date maximum:</span>
                    <input :min="minDate" :style="maxDate ? { 'border': '2px solid rgba(200, 254, 199,.50)' } : { 'border': 'none' }" name="max-date" type="date" v-model="maxDate">
                </div>
            </div>

            <button
                :style="inputArea && minDate && maxDate ? { 'background': 'rgba(200, 254, 199,.90)', 'color': 'black' } : { 'border': 'none' }"
                :disabled="!(inputArea && minDate && maxDate)"
                type="submit" value="Submit" @click.prevent="submitForm" class="searchButton">Search</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "RIB",
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
.homeContainer {
    display: flex;
    flex-direction: column;
}

.homeContainer .titleRIB {
    font-weight: 700;
    font-size: 40px;
    padding: 0 0 0 100px;
}

.homeContainer .inputContainer {
    padding: 0 100px 0 100px;
}

.homeContainer .inputContainer .ribInput {
    display: flex;
    flex-direction: column;
    margin: 50px 0 34px
}

.homeContainer .inputContainer .ribInput span {
    font-weight: 800;
    padding: 0 0 23px;
}

.homeContainer .inputContainer .ribInput input {
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

.homeContainer .inputContainer input:focus {
    --tw-border-opacity: 1;
    border-color: rgb(246 184 62/var(--tw-border-opacity));
    outline: 2px solid transparent;
    outline-offset: 2px;
}

.homeContainer .inputContainer .dateInput {
    display: flex;
    justify-content: space-between;
    margin: 0 0 34px;
    width: 439px;
}
.homeContainer .inputContainer .dateInput .minDate {
    display: flex;
    flex-direction: column;
}

.homeContainer .inputContainer .dateInput .minDate input {
    padding: 0 2.5rem 0 2.5rem;
}


.homeContainer .inputContainer .dateInput .maxDate {
    display: flex;
    flex-direction: column;
}

.homeContainer .inputContainer .dateInput .maxDate input {
    padding: 0 2.5rem 0 2.5rem;
}

.homeContainer .inputContainer .dateInput .maxDate span {
    font-weight: 800;
    padding: 0 0 23px;
}

.homeContainer .inputContainer .dateInput .maxDate input {
    font-family: Poppins, sans-serif;
    font-size: 15px;
    --tw-text-opacity: 1;
    color: rgb(163 163 163/var(--tw-text-opacity));
    width: 189px;
    background-color: hsla(0,0%,100%,.05);
    border: 1px solid hsla(0,0%,100%,.09);
    border-radius: 0.25rem;
    height: 40px;
    color-scheme: dark;
}

.homeContainer .inputContainer .dateInput .maxDate input:focus {
    --tw-border-opacity: 1;
    border: 2px solid rgb(246 184 62/var(--tw-border-opacity));
    outline: 2px solid transparent;
    outline-offset: 2px;
}

.homeContainer .inputContainer .dateInput .minDate span {
    font-weight: 800;
    padding: 0 0 23px;
}

.homeContainer .inputContainer .dateInput .minDate input {
    font-family: Poppins, sans-serif;
    font-size: 15px;
    --tw-text-opacity: 1;
    color: rgb(163 163 163/var(--tw-text-opacity));
    width: 189px;
    background-color: hsla(0,0%,100%,.05);
    border: 1px solid hsla(0,0%,100%,.09);
    border-radius: 0.25rem;
    height: 40px;
    color-scheme: dark;
}
.homeContainer .inputContainer .dateInput .minDate input:focus {
    --tw-border-opacity: 1;
    border: 2px solid rgb(246 184 62/var(--tw-border-opacity));
    outline: 2px solid transparent;
    outline-offset: 2px;
}


.searchButton {
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
