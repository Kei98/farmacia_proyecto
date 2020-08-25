<template>
    <div>
        <form @submit="insertData()" @submit.prevent method="POST">

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

            <router-link :to="{ name: 'ListCompanies'}" class="button">
                Go back
            </router-link>
        </form>

        <div class="messages">{{ message }}</div>

    </div>

</template>

<script>
import axios from "axios";

export default {
    name: "InsertCompany",
    data(){
        return{
            message: "",
            errors: {},
            company:{
                name:"",
                phone_number:"",
                legal_id:"",
                address:"",
            }
        }
    },
    methods: {
        insertData(){
           axios.post("http://farmacia.test/api/company", this.company)
           .then(response => {
               if (response.status === 201){
                   this.message = response.data;
                   this.company = {
                       name:"",
                       phone_number:"",
                       legal_id:"",
                       address:"",
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
