<template>
    <div v-if="drug != null">
        <form @submit="modifyData()" @submit.prevent method="POST">

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

            <router-link :to="{ name: 'ViewInventory', params: { id: inventory.id }}" class="button">
                Go back
            </router-link>

        </form>

        <div class="messages">{{ message }}</div>
    </div>
</template>

<script>
import axios from "axios";

export default {
name: "ModifyInventory",
    props: {
        id: [String, Number]
    },
    data() {
        return {
            inventory: null,
            drug: null,
            message: "",
            drugs: [],
            errors: {}
        }
    },
    mounted() {
        this.loadInventory();
        this.loadDrugs();
    },
    methods: {
        loadInventory() {
            axios.get("http://farmacia.test/api/inventory/" + this.id)
                .then(response => {
                    this.inventory = response.data.inventory;
                    this.drug = response.data.drug;
                })
        },
        loadDrugs() {
            axios.get("http://farmacia.test/api/drug/")
                .then(response => {
                    this.drugs = response.data;
                })
        },
        modifyData() {
            axios.patch("http://farmacia.test/api/inventory/" + this.id, this.inventory)
                .then(response => {
                    if(response.status === 200) {
                        this.message = response.data;
                    }
                }).catch(error => {
                this.errors = error.response.data.errors;
            })
        }
    }
}
</script>

<style scoped lang="scss">
    $pink: #f0abae;
    $red: #bf2f50;

    form {
        width: 500px;
        margin: 0 auto;

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
        margin-top: 20px;
        font-size: 20px;
    }
</style>
