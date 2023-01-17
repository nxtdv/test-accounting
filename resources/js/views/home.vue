<template>
    <div class="home-container">
        <navbar page-name="home"></navbar>

        <div class="container">
            <r-i-b v-bind:input-area="inputArea" v-bind:regex="regex" v-bind:min-date="minDate" v-bind:max-date="maxDate" v-bind:submit-form="submitForm"></r-i-b>

            <div class="transactions-container">
                <div class="title-transaction">
                    TRANSACTION
                </div>

                <div  class="transactions">
                    <div class="template-transactions">
                        <span class="value-in-transaction">Name</span>
                        <span class="value-in-transaction">ID</span>
                        <span class="value-in-transaction">RIB</span>
                        <span class="value-in-transaction">Recette</span>
                        <span class="value-in-transaction">Dépense</span>
                        <span class="value-in-transaction">Date</span>
                    </div>

                    <loader style="margin-top: 200px" v-if="loading"></loader>
                    <div class="list-transactions" v-else-if="!loading">
                        <span style="margin-top: 200px" v-if="!transactionsRequested.length">No transaction found or enter a RIB.</span>
                        <transaction v-else v-bind:transactionsRequested="transactionsRequested"></transaction>
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
import Transaction from "../components/Transaction.vue";
import Loader from "../components/Loader.vue";

export default {
    name: "home",
    components: {
        Navbar,
        RIB,
        Transaction,
        Loader
    },
    data() {
        return {
            regex: false,
            loading: false,
            transactionsRequested: [],
            inputArea: "12345123412345678912",
            minDate: "2021-02-10",
            maxDate: "2024-11-14",
        }
    },
    methods: {
        async submitForm() {
            this.loading = true
            setTimeout(() => this.loading = false, 3000)

            this.transactionsRequested = []
            if (!this.inputArea && !this.minDate && !this.maxDate) {
                return (this.regex = true)
            }

            if (!isNaN(this.inputArea)) {
                const { minDate, maxDate, transactionsRequested } = this;
                const response = await axios.get(`/api/transactions/${this.inputArea}`);
                const { data: transactions } = response

                transactions.forEach(function(transaction) {
                    if (transaction.date >= minDate && transaction.date <= maxDate) {
                        transactionsRequested.push(transaction)

                        if (transactionsRequested) {
                            transactionsRequested.sort(function (transactionA, transactionB) {
                                return (new Date(transactionB.date) - new Date(transactionA.date))
                            })
                        }
                    }
                })
            }
        }
    }
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";

.home-container {
    color: #ffffff;

    .container {
        display: flex;
        margin-top: 50px;

        .transactions-container {
            width: 100%;
            height: 100%;
            padding: 0 100px 0 50px;

            .title-transaction {
                font-weight: 700;
                font-size: 40px;
            }

            .transactions {
                display: flex;
                flex-direction: column;
                align-items: center;

                .template-transactions {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    width: 100%;
                    height: 3rem;
                    color: $green-general;
                    background-color: hsla(0,0%,100%,.09);
                    margin-top: 50px;
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

                .list-transactions {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    width: 100%;
                }
            }
        }
    }
}

input[type="search"]::-webkit-search-decoration,
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-results-button,
input[type="search"]::-webkit-search-results-decoration { display: none; }
</style>
