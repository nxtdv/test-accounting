<template>
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
</template>

<script>
export default {
    name: "Period",
    props: {
        minDate: String,
        maxDate: String
    }
}
</script>

<style scoped>
.dateInput {
    display: flex;
    justify-content: space-between;
    margin: 0 0 34px;
    width: 439px;
}
.dateInput .minDate {
    display: flex;
    flex-direction: column;
}

.dateInput .minDate input {
    padding: 0 2.5rem 0 2.5rem;
}


.dateInput .maxDate {
    display: flex;
    flex-direction: column;
}

.dateInput .maxDate input {
    padding: 0 2.5rem 0 2.5rem;
}

.dateInput .maxDate span {
    font-weight: 800;
    padding: 0 0 23px;
}

.dateInput .maxDate input {
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

.dateInput .maxDate input:focus {
    --tw-border-opacity: 1;
    border: 2px solid rgb(246 184 62/var(--tw-border-opacity));
    outline: 2px solid transparent;
    outline-offset: 2px;
}

.dateInput .minDate span {
    font-weight: 800;
    padding: 0 0 23px;
}

.dateInput .minDate input {
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
.dateInput .minDate input:focus {
    --tw-border-opacity: 1;
    border: 2px solid rgb(246 184 62/var(--tw-border-opacity));
    outline: 2px solid transparent;
    outline-offset: 2px;
}
</style>
