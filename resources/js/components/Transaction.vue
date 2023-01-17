<template>
    <div class="transaction-container">
        <div class="transaction" v-for="transaction in transactionsRequested" :key="transaction.id">
            <span class="value-in-transaction">{{transaction.label}}</span>
            <span class="value-in-transaction">{{transaction.id}}</span>
            <span class="value-in-transaction">{{transaction.rib}}</span>
            <span style="color: #C8FEC7" class="value-in-transaction" v-if="transaction.amount > 0">{{transaction.amount}} €</span>
            <span style="color: #C8FEC7" class="value-in-transaction" v-else>0 €</span>
            <span style="color: #EB5757" class="value-in-transaction" v-if="transaction.amount < 0">{{Math.abs(transaction.amount)}} €</span>
            <span style="color: #EB5757" class="value-in-transaction" v-else>0 €</span>
            <span class="value-in-transaction">{{transaction.date}}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "Transaction",
    props: {
        transactionsRequested: Array,
    }
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";

.transaction-container {
    width: 100%;

    .transaction {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        height: 3rem;
        background-color: hsla(0,0%,100%,.09);
        margin-top: 30px;
        cursor: pointer;
        font-weight: 600;
        font-size: .875rem;
        line-height: 1.25rem;
        letter-spacing: .0025em;
        padding: 0 1rem;
        border-radius: 0.25rem;

        .value-in-transaction {
            display: flex;
            justify-content: center;
            width: 160px;
        }
    }

    .transaction:last-child {
        margin-bottom: 30px;
    }
}
</style>
