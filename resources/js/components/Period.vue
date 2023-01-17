<template>
    <div class="date-input">
        <div class="min-date">
            <span>Date minimum:</span>
            <input :style="verificationIsEmptyMinDate" name="min-date" type="date" v-model="minDate">
        </div>
        <div class="max-date">
            <span>Date maximum:</span>
            <input :style="verificationIsEmptyMaxDate" name="max-date" type="date" v-model="maxDate" :min="minDate">
        </div>
    </div>
</template>

<script>
export default {
    name: "Period",
    props: {
        minDate: String,
        maxDate: String
    },
    computed: {
        verificationIsEmptyMinDate() {
            return this.minDate ? { 'border': '2px solid rgba(200, 254, 199,.50)' } : { 'border': 'none' };
        },
        verificationIsEmptyMaxDate() {
            return this.maxDate ? { 'border': '2px solid rgba(200, 254, 199,.50)' } : { 'border': 'none' };
        },
    }
}
</script>

<style lang="scss" scoped>
.date-input {
    display: flex;
    justify-content: space-between;
    margin-bottom: 34px;
    width: 439px;

    .min-date {
        display: flex;
        flex-direction: column;

        input {
            padding: 0 2.5rem;
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
        }:focus {
             --tw-border-opacity: 1;
             border: 2px solid rgb(246 184 62/var(--tw-border-opacity));
             outline: 2px solid transparent;
             outline-offset: 2px;
         }

        span {
            font-weight: 800;
            padding-bottom: 23px;
        }
    }

    .max-date {
        display: flex;
        flex-direction: column;

        input {
            padding: 0 2.5rem;
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
        }:focus {
             --tw-border-opacity: 1;
             border: 2px solid rgb(246 184 62/var(--tw-border-opacity));
             outline: 2px solid transparent;
             outline-offset: 2px;
         }

        span {
            font-weight: 800;
            padding-bottom: 23px;
        }
    }
}
</style>
