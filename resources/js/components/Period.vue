<template>
    <div class="date_input">
        <div class="min_date">
            <span>Date minimum:</span>
            <input :style="minDate ? { 'border': '2px solid rgba(200, 254, 199,.50)' } : { 'border': 'none' }" name="min-date" type="date" v-model="minDate">
        </div>
        <div class="max_date">
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
.date_input {
    display: flex;
    justify-content: space-between;
    margin: 0 0 34px;
    width: 439px;
}
.date_input .min_date {
    display: flex;
    flex-direction: column;
}

.date_input .min_date input {
    padding: 0 2.5rem 0 2.5rem;
}


.date_input .max_date {
    display: flex;
    flex-direction: column;
}

.date_input .max_date input {
    padding: 0 2.5rem 0 2.5rem;
}

.date_input .max_date span {
    font-weight: 800;
    padding: 0 0 23px;
}

.date_input .max_date input {
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

.date_input .max_date input:focus {
    --tw-border-opacity: 1;
    border: 2px solid rgb(246 184 62/var(--tw-border-opacity));
    outline: 2px solid transparent;
    outline-offset: 2px;
}

.date_input .min_date span {
    font-weight: 800;
    padding: 0 0 23px;
}

.date_input .min_date input {
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
.date_input .min_date input:focus {
    --tw-border-opacity: 1;
    border: 2px solid rgb(246 184 62/var(--tw-border-opacity));
    outline: 2px solid transparent;
    outline-offset: 2px;
}
</style>
