<template>
    <div class="solde-container">
        <navbar page-name="solde"></navbar>

        <div class="container">
            <div class="solde-container">
                <div class="title-transaction">SOLDE</div>
                <div v-if="loading" class="loader">
                    <loader></loader>
                </div>

                <div v-else-if="!loading && totalRecipe && totalSpent && soldeTotal" class="soldes-container">
                    <div class="all-soldes">
                        <div class="recipe">
                            <span class="recipe-title">RECETTE</span>
                            <span class="recipe-amount">{{ verificationIsEmptyRecipe }}</span>
                        </div>
                        <div class="depense">
                            <span class="spent-title">DEPENSE</span>
                            <span class="spent-amount">{{ verificationIsEmptySpent }}</span>
                        </div>
                    </div>
                    <div class="solde">
                        <span class="solde-title">SOLDE TOTAL</span>
                        <span class="solde-mount">{{ verificationIsEmptySoldeTotal }}</span>
                    </div>
                </div>
                <div class="is-empty" v-else>Please enter a rib.</div>
            </div>

            <r-i-b v-bind:input-area="inputArea" v-bind:regex="regex" v-bind:min-date="minDate" v-bind:max-date="maxDate" v-bind:submit-form="submitForm"></r-i-b>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Navbar from "../components/Navbar.vue";
import RIB from "../components/RIB.vue";
import Loader from "../components/Loader.vue";

export default {
    name: "solde",
    components: {
        Navbar,
        RIB,
        Loader
    },
    comments: {
        Navbar,
        RIB
    },
    data()
    {
        return {
            regex: false,
            loading: false,
            soldeTotal: "",
            totalRecipe: 0,
            totalSpent: 0,
            inputArea: "12345123412345678912",
            minDate: "2021-02-10",
            maxDate: "2021-02-14",
        }
    },
    computed: {
        verificationIsEmptyRecipe() {
            return !this.totalRecipe ? 0 : `+ ${this.totalRecipe}`;
        },
        verificationIsEmptySpent() {
            return !this.totalSpent ? 0 : `- ${this.totalSpent}`;
        },
        verificationIsEmptySoldeTotal() {
            return !this.soldeTotal ? 0 : this.soldeTotal;
        }
    },
    methods: {
        async submitForm() {
            this.loading = true
            setTimeout(() => this.loading = false, 3000)

            function formatBalanceInEuros(amount) {
                return (amount.toLocaleString('fr-FR', {style: 'currency', currency: 'EUR', maximumFractionDigits: 0}))
            }

            if (!this.inputArea && !this.minDate && !this.maxDate) {
                return (this.regex = true)
            }

            if (!isNaN(this.inputArea)) {
                const { minDate, maxDate } = this;
                const response = await axios.get(`/api/transactions/${this.inputArea}`);
                const { data: allOperations } = response
                let totalRecipe = 0;
                let totalSpent = 0;

                allOperations.forEach(function(operation) {
                    if (operation.date >= minDate && operation.date <= maxDate) {
                        if (operation.amount > 0) {
                            totalRecipe += operation.amount
                        }

                        if (operation.amount < 0) {
                            totalSpent += Math.abs(operation.amount)
                        }
                    }
                })

                this.totalSpent = formatBalanceInEuros(totalSpent)
                this.totalRecipe = formatBalanceInEuros(totalRecipe)
                this.soldeTotal = formatBalanceInEuros(totalRecipe - totalSpent)
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.solde-container {
    color: #ffffff;

    .container {
        display: flex;
        margin-top: 50px;

        .solde-container {
            width: 100%;
            height: 100%;

            .title-transaction {
                font-weight: 700;
                padding-left: 100px;
                font-size: 40px;
            }

            .soldes-container {
                margin-top: 50px;
                padding: 0 50px 0 100px;

                .all-soldes {
                    display: flex;
                    justify-content: space-between;

                    .recipe {
                        display: flex;
                        flex-direction: column;

                        .recipe-title {
                            font-weight: 500;
                            font-size: 25px;
                        }

                        .recipe-amount {
                            font-weight: 600;
                            font-size: 60px;
                            color: rgb(200, 254, 199);
                        }
                    }

                    .depense {
                        display: flex;
                        flex-direction: column;
                        margin-right: 180px;

                        .spent-title {
                            font-weight: 500;
                            font-size: 25px;
                        }

                        .spent-amount {
                            font-weight: 600;
                            font-size: 60px;
                            color: rgb(235, 87, 87);
                        }
                    }
                }

                .solde {
                    display: flex;
                    flex-direction: column;
                    margin-top: 90px;

                    .solde-title {
                        font-weight: 500;
                        font-size: 25px;
                    }

                    .solde-mount {
                        font-weight: 800;
                        font-size: 150px;
                    }
                }
            }

            .is-empty {
                display: flex;
                justify-content: center;
                padding: 0 100px;
                margin-top: 200px;
            }

            .loader {
                display: flex;
                justify-content: center;
                padding: 0 100px;
                margin-top: 200px
            }
        }
    }
}

input[type="search"]::-webkit-search-decoration,
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-results-button,
input[type="search"]::-webkit-search-results-decoration { display: none; }
</style>
