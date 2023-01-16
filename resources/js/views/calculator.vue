<template>
    <div class="container">
        <navbar page-name="calculator"></navbar>

        <div class="main">
            <div class="soldeContainer">
                <div class="titleTransaction">SOLDE</div>
                <div v-if="loading" class="loader">
                    <loader></loader>
                </div>

                <div v-else-if="!loading && totalRecipe && totalSpent && soldeTotal" class="soldesContainer">
                    <div class="allSoldes">
                        <div class="recette">
                            <span class="recetteTitle">RECETTE</span>
                            <span class="recetteAmount">{{!totalRecipe ? 0 : `+ ${totalRecipe}`}}</span>
                        </div>
                        <div class="depense">
                            <span class="depenseTitle">DEPENSE</span>
                            <span class="depenseAmount">{{!totalSpent ? 0 : `- ${totalSpent}`}}</span>
                        </div>
                    </div>
                    <div class="endSolde">
                        <span class="endSoldeTitle">SOLDE TOTAL</span>
                        <span class="endSoldeAmount">{{!soldeTotal ? 0 : soldeTotal}}</span>
                    </div>
                </div>
                <div class="isEmpty" v-else>Please enter a rib.</div>
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
    name: "calculator",
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

.soldeContainer {
    width: 100%;
    height: 100%;
}

.soldeContainer .titleTransaction {
    font-weight: 700;
    padding: 0 0 0 100px;
    font-size: 40px;
}

.soldeContainer .soldesContainer {
    margin-top: 50px;
    padding: 0 50px 0 100px;
}

.soldeContainer .soldesContainer .allSoldes {
    display: flex;
    justify-content: space-between;
}

.soldeContainer .soldesContainer .allSoldes .recette {
    display: flex;
    flex-direction: column;
}

.soldeContainer .soldesContainer .allSoldes .recette .recetteTitle {
    font-weight: 500;
    font-size: 25px;
}
.soldeContainer .soldesContainer .allSoldes .recette .recetteAmount {
    font-weight: 600;
    font-size: 60px;
    color: rgb(200, 254, 199);
}

.soldeContainer .soldesContainer .allSoldes .depense {
    display: flex;
    flex-direction: column;
    margin-right: 180px;
}

.soldeContainer .soldesContainer .allSoldes .depense .depenseTitle {
    font-weight: 500;
    font-size: 25px;
}
.soldeContainer .soldesContainer .allSoldes .depense .depenseAmount {
    font-weight: 600;
    font-size: 60px;
    color: rgb(235, 87, 87);
}

.soldeContainer .soldesContainer .endSolde {
    display: flex;
    flex-direction: column;
    margin-top: 90px;
}

.soldeContainer .soldesContainer .endSolde .endSoldeTitle {
    font-weight: 500;
    font-size: 25px;
}
.soldeContainer .soldesContainer .endSolde .endSoldeAmount {
    font-weight: 800;
    font-size: 150px;
}

.soldeContainer .isEmpty {
    display: flex;
    justify-content: center;
    padding: 0 100px;
    margin-top: 200px;
}

.soldeContainer .loader {
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
