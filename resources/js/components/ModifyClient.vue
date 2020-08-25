<template>
    <div v-if="client != null">
        <form @submit="modifyData()" @submit.prevent method="POST">

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

            <router-link :to="{ name: 'ViewClient', params: { id: client.id }}" class="button">
                Go back
            </router-link>

        </form>

        <div class="messages">{{ message }}</div>
    </div>
</template>

<script>
import axios from "axios";

export default {
name: "ModifyClient",
    props: {
        id: [String, Number]
    },
    data() {
        return {
            client: null,
            message: "",
            errors: {}
        }
    },
    mounted() {
        this.loadClient();
    },
    methods: {
        loadClient() {
            axios.get("http://farmacia.test/api/client/" + this.id)
                .then(response => {
                    this.client = response.data;
                })
        },
        modifyData() {
            console.log(this.client);
            axios.patch("http://farmacia.test/api/client/" + this.id, this.client)
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
