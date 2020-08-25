<template>
    <div>
        <form @submit="insertData()" @submit.prevent method="POST">

            <label for="name">Name: </label>
            <input id="name" name="name" required type="text" v-model="client.name">
            <div class="alert alert-danger" v-if="errors && errors.name">
                {{ errors.name[0] }}
            </div>

            <label for="id_person">Person ID: </label>
            <input id="id_person" name="id_person" required type="number" v-model="client.id_person">
            <div class="alert alert-danger" v-if="errors && errors.id_person">
                {{ errors.id_person[0] }}
            </div>

            <label for="tel_number">Telephone number: </label>
            <input id="tel_number" name="tel_number" required type="text" v-model="client.tel_number">
            <div class="alert alert-danger" v-if="errors && errors.tel_number">
                {{ errors.tel_number[0] }}
            </div>

            <input class="button" type="submit" value="Save">

            <router-link :to="{ name: 'ListClients'}" class="button">
                Go back
            </router-link>

        </form>

        <div class="messages">{{ message }}</div>

    </div>
</template>

<script>
import axios from "axios";

export default {
name: "InsertClient",
    data() {
        return {
            message: "",
            errors: {},

             client: {
                name: "",
                id_person: 0,
                tel_number: "",
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
            axios.post("http://farmacia.test/api/client", this.client)
                .then(response => {
                    if (response.status === 201) {
                        this.message = response.data;
                        this.client = {
                            name: "",
                            id_person: 0,
                            tel_number: "",
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
