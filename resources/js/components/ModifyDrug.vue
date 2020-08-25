<template>
    <div v-if="drug != null">
        <form @submit="modifyData()" @submit.prevent method="POST">

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
                <option v-bind:value="provider.id">
                    {{ provider.id }}, {{ provider.name }}
                </option>
            </select>
            <div class="alert alert-danger" v-if="errors && errors.id_provider">
                {{ errors.id_provider[0] }}
            </div>

            <input class="button" type="submit" value="Save">

            <router-link :to="{ name: 'ViewDrug', params: { id: drug.id }}" class="button">
                Go back
            </router-link>

        </form>

        <div class="messages">{{ message }}</div>
    </div>
</template>

<script>
export default {
    name: "ModifyDrug",
    props: {
        id: [String, Number]
    },
    data() {
        return {
            drug: null,
            provider: null,
            administrationForm: ["ocular", "parenteral", "topical", "sublingual", "otic",
                "intranasal", "inhalation", "rectal", "vaginal", "oral"],
            message: "",
            errors: {}
        }
    },
    mounted() {
        this.loadDrug();
    },
    methods: {
        loadDrug() {
            axios.get("http://farmacia.test/api/drug/" + this.id)
                .then(response => {
                    this.drug = response.data.drug;
                    this.provider = response.data.provider;
                })
        },
        modifyData() {
            axios.patch("http://farmacia.test/api/drug/" + this.id, this.drug)
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
