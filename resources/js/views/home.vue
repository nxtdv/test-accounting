<template>
    <div class="container">
        <navbar page-name="home"></navbar>

        <div class="main">
            <r-i-b v-bind:input-area="inputArea" v-bind:regex="regex" v-bind:min-date="minDate" v-bind:max-date="maxDate" v-bind:submit-form="submitForm"></r-i-b>

            <div class="operation_container">
                <div class="title_transaction">
                    TRANSACTION
                </div>

                <div  class="transactions">
                    <div class="template_transactions">
                        <span class="same">Name</span>
                        <span class="same">ID</span>
                        <span class="same">RIB</span>
                        <span class="same">Recette</span>
                        <span class="same">Dépense</span>
                        <span class="same">Date</span>
                    </div>

                    <loader style="margin-top: 200px" v-if="loading"></loader>
                    <div class="condition" v-else-if="!loading">
                        <span style="margin-top: 200px" v-if="!allTransactionsRequested.length">No transaction found or enter a RIB.</span>
                        <operation v-else v-bind:allTransactionsRequested="allTransactionsRequested"></operation>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Navbar from "../components/Navbar.vue";
import RIB from "../components/RIB.vue"
import Operation from "../components/Operation.vue";
import Loader from "../components/Loader.vue";

export default {
    name: "home",
    components: {
        Navbar,
        RIB,
        Operation,
        Loader
    },
    data() {
        return {
            regex: false,
            loading: false,
            allTransactionsRequested: [],
            inputArea: "12345123412345678912",
            minDate: "2021-02-10",
            maxDate: "2024-11-14",
        }
    },
    methods: {
        async submitForm() {
            this.loading = true
            setTimeout(() => this.loading = false, 3000)

            this.allTransactionsRequested = []
            if (!this.inputArea && !this.minDate && !this.maxDate) {
                return (this.regex = true)
            }

            if (!isNaN(this.inputArea)) {
                const { minDate, maxDate, allTransactionsRequested } = this;
                const response = await axios.get(`/api/transactions/${this.inputArea}`);
                const { data: allOperations } = response

                allOperations.forEach(function(operation) {
                    if (operation.date >= minDate && operation.date <= maxDate) {
                        allTransactionsRequested.push(operation)

                        if (allTransactionsRequested) {
                            allTransactionsRequested.sort(function (operationA, operationB) {
                                return (new Date(operationB.date) - new Date(operationA.date))
                            })
                        }
                    }
                })
            }
        }
    }
}
</script>

<style scoped>
.container {
    color: #ffffff;
}

.main {
    display: flex;
    margin-top: 50px;
}

.operation_container {
    width: 100%;
    height: 100%;
    padding: 0 100px 0 50px;
}

.operation_container .title_transaction {
    font-weight: 700;
    font-size: 40px;
}

.operation_container .transactions {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.operation_container .transactions .template_transactions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    height: 3rem;
    color: #C8FEC7;
    background-color: hsla(0,0%,100%,.09);
    margin-top: 50px;
    font-weight: 600;
    font-size: .875rem;
    line-height: 1.25rem;
    letter-spacing: .0025em;
    padding: 0 1rem 0 1rem;
    border-radius: 0.25rem;
}

.operation_container .transactions .condition {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

.same {
    display: flex;
    justify-content: center;
    width: 160px;
}

input[type="search"]::-webkit-search-decoration,
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-results-button,
input[type="search"]::-webkit-search-results-decoration { display: none; }
</style>
