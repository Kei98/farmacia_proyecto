<template>
    <div>
        <form @submit="insertData()" @submit.prevent method="POST">

            <label for="name">Name: </label>
            <input id="name" name="name" required type="text" v-model="drug.name">
            <div class="alert alert-danger" v-if="errors && errors.name">
                {{ errors.name[0] }}
            </div>

            <label for="description">Description: </label>
            <input id="description" name="description" required type="text" v-model="drug.description">
            <div class="alert alert-danger" v-if="errors && errors.description">
                {{ errors.description[0] }}
            </div>

            <label for="administration">Administration: </label>
            <select id="administration" name="administration" v-model="drug.administration">
                <option v-bind:value="administration" v-for="administration in administrationForm">
                    {{ administration }}
                </option>
            </select>
            <div class="alert alert-danger" v-if="errors && errors.administration">
                {{ errors.administration[0] }}
            </div>

            <label for="price">Price: </label>
            <input id="price" name="price" required type="number" v-model="drug.price">
            <div class="alert alert-danger" v-if="errors && errors.price">
                {{ errors.price[0] }}
            </div>

            <label for="id_provider">Provider ID: </label>
            <select id="id_provider" name="id_provider" v-model="drug.id_provider">
                <option v-bind:value="provider.id" v-for="provider in providers">
                    {{ provider.id }}, {{ provider.name }}
                </option>
            </select>
            <div class="alert alert-danger" v-if="errors && errors.id_provider">
                {{ errors.id_provider[0] }}
            </div>

            <input class="button" type="submit" value="Save">

            <router-link :to="{ name: 'ListDrugs'}" class="button">
                Go back
            </router-link>

        </form>

        <div class="messages">{{ message }}</div>

    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "InsertDrug",
    data() {
        return {
            message: "",
            errors: {},
            providers: {},
            administrationForm: ["ocular", "parenteral", "topical", "sublingual", "otic",
                "intranasal", "inhalation", "rectal", "vaginal", "oral"],
            drug: {
                name: "",
                description: "",
                administration: "",
                price: 0,
                id_provider: 0,
            }
        }
    },
    mounted() {
        this.loadProviders();
    },
    methods: {
        loadProviders() {
            axios.get("http://farmacia.test/api/provider/")
                .then(response => {
                    this.providers = response.data;
                })
        },
        insertData() {
            axios.post("http://farmacia.test/api/drug", this.drug)
                .then(response => {
                    if (response.status === 201) {
                        this.message = response.data;
                        this.drug = {
                            name: "",
                            description: "",
                            administration: "",
                            price: 0,
                            id_provider: 0,
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
