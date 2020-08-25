<template>
    <div v-if="drug != null">
        <form @submit="modifyData()" @submit.prevent method="POST">

            <label for="name">Name: </label>
            <input id="name" name="name" required type="text" v-model="company.name">
            <div class="alert alert-danger" v-if="errors && errors.name">
                {{ errors.name[0] }}
            </div>

            <label for="phone_number">Phone Number: </label>
            <input id="phone_number" name="phone_number" required type="text" v-model="company.phone_number">
            <div class="alert alert-danger" v-if="errors && errors.phone_number">
                {{ errors.phone_number[0] }}
            </div>

            <label for="legal_id">Legal ID: </label>
            <input id="legal_id" name="legal_id" required type="text" v-model="company.legal_id">
            <div class="alert alert-danger" v-if="errors && errors.legal_id">
                {{ errors.legal_id[0] }}
            </div>

            <label for="address">Address: </label>
            <input id="address" name="address" required type="text" v-model="company.address">
            <div class="alert alert-danger" v-if="errors && errors.address">
                {{ errors.address[0] }}
            </div>

            <input class="button" type="submit" value="Save">

            <router-link :to="{ name: 'ViewCompany', params: {id:company.id}}" class="button">
                Go back
            </router-link>

        </form>

        <div class="messages">{{ message }}</div>

    </div>
</template>

<script>
    import axios from "axios";

export default {
name: "ModifyCompany",
    props: {
        id: [String, Number]
    },
    data() {
        return {
            company: null,
            message: "",
            errors: {}
        }
    },
    mounted() {
        this.loadCompany();
    },
    methods: {
        loadCompany() {
            axios.get("http://farmacia.test/api/company/" + this.id)
                .then(response => {
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
