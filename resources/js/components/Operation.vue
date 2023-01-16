<template>
    <div class="condition">
        <div class="operation" v-for="operation in allTransactionsRequested" :key="operation.id">
            <span class="same">{{operation.label}}</span>
            <span class="same">{{operation.id}}</span>
            <span class="same">{{operation.rib}}</span>
            <span style="color: #C8FEC7" class="same" v-if="operation.amount > 0">{{operation.amount}} €</span>
            <span style="color: #C8FEC7" class="same" v-else>0 €</span>
            <span style="color: #EB5757" class="same" v-if="operation.amount < 0">{{Math.abs(operation.amount)}} €</span>
            <span style="color: #EB5757" class="same" v-else>0 €</span>
            <span class="same">{{operation.date}}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "Operation",
    props: {
        allTransactionsRequested: Array,
    }
}
</script>

<style scoped>
.operation {
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
    padding: 0 1rem 0 1rem;
    border-radius: 0.25rem;
}

.operation:last-child {
    margin-bottom: 30px;
}

.same {
    display: flex;
    justify-content: center;
    width: 160px;
}

.condition {
    width: 100%;
}
</style>
