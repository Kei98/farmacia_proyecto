<template>
    <div v-if="drug != null">
        <form @submit="modifyData()" @submit.prevent method="POST">

            <label for="name">Name: </label>
            <input id="name" name="name" required type="text" v-model="provider.name">
            <div class="alert alert-danger" v-if="errors && errors.name">
                {{ errors.name[0] }}
            </div>

            <label for="phone_number">Phone Number: </label>
            <input id="phone_number" name="phone_number" required type="text" v-model="provider.phone_number">
            <div class="alert alert-danger" v-if="errors && errors.name">
                {{ errors.phone_number[0] }}
            </div>

            <label for="id_company">Company ID: </label>
            <select id="id_company" name="id_company" v-model="provider.id_company">
                <option v-bind:value="company.id" v-for="company in companies">
                    {{ provider.id }}, {{ provider.name }}
                </option>
            </select>
            <div class="alert alert-danger" v-if="errors && errors.id_company">
                {{ errors.id_company[0] }}
            </div>

            <input class="button" type="submit" value="Save">

            <router-link :to="{ name: 'ListProviders', params: {id: provider.id}}" class="button">
                Go back
            </router-link>

        </form>

        <div class="messages">{{ message }}</div>

    </div>

</template>

<script>
    import axios from "axios";

export default {
    name: "ModifyProvider",
    props: {
        id: [String, Number]
    },
    data() {
        return {
            provider: null,
            company: null,
            message: "",
            errors: {}
        }
    },
    mounted() {
        this.loadProviders();
    },
    methods: {
        loadProviders() {
            axios.get("http://farmacia.test/api/provider/" + this.id)
                .then(response => {
                    this.provider = response.data.provider;
                    this.company = response.data.company;
                })
        },
        modifyData() {
            axios.patch("http://farmacia.test/api/company/" + this.id, this.company)
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
