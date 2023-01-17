<template>
    <div class="container">
        <navbar page-name="solde"></navbar>

        <div class="main">
            <div class="solde_container">
                <div class="title_transaction">SOLDE</div>
                <div v-if="loading" class="loader">
                    <loader></loader>
                </div>

                <div v-else-if="!loading && totalRecipe && totalSpent && soldeTotal" class="soldes_container">
                    <div class="all_soldes">
                        <div class="recette">
                            <span class="recette_title">RECETTE</span>
                            <span class="recette_amount">{{ verificationIsEmptyRecipe }}</span>
                        </div>
                        <div class="depense">
                            <span class="depense_title">DEPENSE</span>
                            <span class="depense_amount">{{ verificationIsEmptySpent }}</span>
                        </div>
                    </div>
                    <div class="endSolde">
                        <span class="end_solde_title">SOLDE TOTAL</span>
                        <span class="end_solde_amount">{{ verificationIsEmptySoldeTotal }}</span>
                    </div>
                </div>
                <div class="is_empty" v-else>Please enter a rib.</div>
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
            return!this.totalRecipe ? 0 : `+ ${this.totalRecipe}`;
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

<style scoped>
.container {
    color: #ffffff;
}

.main {
    display: flex;
    margin-top: 50px;
}

.solde_container {
    width: 100%;
    height: 100%;
}

.solde_container .title_transaction {
    font-weight: 700;
    padding: 0 0 0 100px;
    font-size: 40px;
}

.solde_container .soldes_container {
    margin-top: 50px;
    padding: 0 50px 0 100px;
}

.solde_container .soldes_container .all_soldes {
    display: flex;
    justify-content: space-between;
}

.solde_container .soldes_container .all_soldes .recette {
    display: flex;
    flex-direction: column;
}

.solde_container .soldes_container .all_soldes .recette .recette_title {
    font-weight: 500;
    font-size: 25px;
}
.solde_container .soldes_container .all_soldes .recette .recette_amount {
    font-weight: 600;
    font-size: 60px;
    color: rgb(200, 254, 199);
}

.solde_container .soldes_container .all_soldes .depense {
    display: flex;
    flex-direction: column;
    margin-right: 180px;
}

.solde_container .soldes_container .all_soldes .depense .depense_title {
    font-weight: 500;
    font-size: 25px;
}
.solde_container .soldes_container .all_soldes .depense .depense_amount {
    font-weight: 600;
    font-size: 60px;
    color: rgb(235, 87, 87);
}

.solde_container .soldes_container .endSolde {
    display: flex;
    flex-direction: column;
    margin-top: 90px;
}

.solde_container .soldes_container .endSolde .end_solde_title {
    font-weight: 500;
    font-size: 25px;
}
.solde_container .soldes_container .endSolde .end_solde_amount {
    font-weight: 800;
    font-size: 150px;
}

.solde_container .is_empty {
    display: flex;
    justify-content: center;
    padding: 0 100px;
    margin-top: 200px;
}

.solde_container .loader {
    display: flex;
    justify-content: center;
    padding: 0 100px;
    margin-top: 200px
}

input[type="search"]::-webkit-search-decoration,
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-results-button,
input[type="search"]::-webkit-search-results-decoration { display: none; }
</style>
