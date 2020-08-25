<template>
    <div v-if="company !== null" class="infoCompany">

    <h4>ID: <span>{{ company.id }}</span></h4>
    <h4>Name: <span>{{ company.name }}</span></h4>
    <h4>Phone Number: <span>{{ company.phone_number }}</span></h4>
    <h4>Legal ID: <span>{{ company.legal_id }}</span></h4>
    <h4>Address: <span>{{ company.address }}</span></h4>

    <router-link class="button" :to="{ name: 'ModifyCompany', params: { id: company.id }}">Modify</router-link>
    <button class="button" @click="deleteData">Delete</button>
    <router-link class="button" :to="{ name: 'ListCompanies' }">Go back</router-link>
    </div>

</template>

<script>
    import axios from "axios";

export default {
name: "ViewCompany",
    props: {
        id: [String, Number]
    },
    data() {
        return {
            company: null,
        }
    },
    mounted() {
        this.loadCompany();
    },
    methods: {
        loadCompany() {
            axios.get("http://farmacia.test/api/company/" + this.id)
                .then(response => {
                    console.log(response);
                    this.company = response.data;
                })
        },
        deleteData() {
            axios.delete("http://farmacia.test/api/company/" + this.id)
                .then(response => {
                    if (response.status === 200) {
                        this.$router.push("/company");
                    }
                })
        },
    }

}
</script>

<style scoped lang="scss">
    $pink: #f0abae;
    $red: #bf2f50;

    .infoCompany {
        border: 2px solid $red;
        padding: 50px 30px;
        width: 500px;
        margin: 0 auto;
        font-size: 30px;
        text-align: left;

        span {
            font-weight: normal;
        }

        button {
            width: 100%;
            font-size: 30px;
        }

        .button {
            margin-top: 20px;
        }
        .messages{
            font-size: 20px;
        }
    }

</style>
