<template>
    <div>
        <form @submit="insertData()" @submit.prevent method="POST">

            <label for="amount">Amount: </label>
            <input id="amount" name="amount" required type="number" v-model="inventory.amount">
            <div class="alert alert-danger" v-if="errors && errors.amount">
                {{ errors.amount[0] }}
            </div>

            <label for="id_drug">Drug ID: </label>
            <select id="id_drug" name="id_drug" v-model="inventory.id_drug">
                <option v-bind:value="drug.id" v-for="drug in drugs">
                    {{ drug.id }}, {{ drug.name }}
                </option>
            </select>
            <div class="alert alert-danger" v-if="errors && errors.id_drug">
                {{ errors.id_drug[0] }}
            </div>

            <input class="button" type="submit" value="Save">

            <router-link :to="{ name: 'ListInventories'}" class="button">
                Go back
            </router-link>

        </form>

        <div class="messages">{{ message }}</div>

    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "InsertInventory",
    data() {
        return {
            message: "",
            errors: {},
            drugs: [],

            inventory: {
                amount: 0,
                id_drug: 0,
            }
        }
    },
    mounted() {
        this.loadDrugs();
    },
    methods: {
        loadDrugs() {
            axios.get("http://farmacia.test/api/drug/")
                .then(response => {
                    this.drugs = response.data;
                })
        },
        insertData() {
            axios.post("http://farmacia.test/api/inventory", this.inventory)
                .then(response => {
                    if (response.status === 201) {
                        this.message = response.data;
                        this.inventory = {
                            amount: 0,
                            id_drug: 0,
                        }
                    }
                }).catch(error => {
                if(error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            })
        }
    }

}
</script>

<style scoped lang="scss">
    $pink: #f0abae;
    $red: #bf2f50;

    form {
        margin: 0 auto;
        width: 500px;

        label,
        input,
        select {
            display: block;
            font-size: 30px;
            margin: 10px auto;
        }

        .button {
            font-size: 30px;
            margin-top: 20px;
        }

        label {
            font-weight: 600;
        }

        input,
        select {
            width: 100%;
            color: $red;
            padding: 5px;

            &[type=submit] {
                margin-top: 30px;
            }
        }

        select {
            padding: 10px 5px;
        }
    }

    .messages {
        font-size: 20px;
        margin-top: 20px;
    }
</style>
