<template>
    <div>
        <form @submit="insertData()" @submit.prevent method="POST">

            <!--Hidden & get them automatically, later-->
            <label for="date">Date: </label>
            <input id="date" name="date" required type="date" v-model="sale.date">
            <div class="alert alert-danger" v-if="errors && errors.date">
                {{ errors.date[0] }}
            </div>

            <label for="discount">Discount: </label>
            <input id="discount" name="discount" required type="number" v-model="sale.discount">
            <div class="alert alert-danger" v-if="errors && errors.discount">
                {{ errors.discount[0] }}
            </div>

            <label for="tax">Tax: </label>
            <input id="tax" name="tax" required type="number" v-model="sale.tax">
            <div class="alert alert-danger" v-if="errors && errors.tax">
                {{ errors.tax[0] }}
            </div>

            <label for="final_amount">Final amount: </label>
            <input id="final_amount" name="final_amount" required type="number" v-model="sale.final_amount">
            <div class="alert alert-danger" v-if="errors && errors.final_amount">
                {{ errors.final_amount[0] }}
            </div>

            <label for="id_client">Client ID: </label>
            <select id="id_client" name="id_client" v-model="sale.id_client">
                <option v-bind:value="client.id" v-for="client in clients">
                    {{ client.id }}, {{ client.name }}
                </option>
            </select>
            <div class="alert alert-danger" v-if="errors && errors.id_client">
                {{ errors.id_client[0] }}
            </div>

            <input class="button" type="submit" value="Save">

            <router-link :to="{ name: 'ListSales'}" class="button">
                Go back
            </router-link>

        </form>

        <div class="messages">{{ message }}</div>

    </div>
</template>

<script>
import axios from "axios";


export default {
    name: "InsertSale",
    data() {
        return {
            message: "",
            errors: {},
            clients: [],

            sale: {
                date: "",
                discount: 0,
                tax: 0,
                final_amount: 0,
                id_client: 0,
                id_staff: sessionStorage.getItem('userId'),
            }
        }
    },
    mounted() {
        this.loadClients();
    },
    methods: {
        loadClients() {
            axios.get("http://farmacia.test/api/client/")
                .then(response => {
                    this.clients = response.data;
                })
        },
        insertData() {
            console.log(this.sale);
            axios.post("http://farmacia.test/api/sale", this.sale)
                .then(response => {
                    if (response.status === 201) {
                        this.message = response.data;
                        this.sale = {
                            date: "",
                            discount: 0,
                            tax: 0,
                            final_amount: 0,
                            id_client: 0,
                            id_staff: sessionStorage.getItem('userId'),
                        }
                    }
                }).catch(error => {
                if (error.response.status === 422) {
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
