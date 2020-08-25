<template>
    <div v-if="provider !== null" class="infoProvider">

        <h4>ID: <span>{{ provider.id }}</span></h4>
        <h4>Name: <span>{{ provider.name }}</span></h4>
        <h4>Phone Number: <span>{{ provider.phone_number }}</span></h4>
        <h4>Company ID: <span> <router-link class="button" :to="{ name: 'ViewCompany', params: { id: provider.id_company }}">
            {{ company.id }}, {{ company.name }}</router-link></span></h4>


        <router-link class="button" :to="{ name: 'ModifyProvider', params: { id: provider.id }}">Modify</router-link>
        <button class="button" @click="deleteData">Delete</button>
        <router-link class="button" :to="{ name: 'ListProvider' }">Go back</router-link>
    </div>


</template>

<script>
import axios from "axios";

export default {
    name: "ViewProvider",
    props: {
        id: [String, Number]
    },
    data() {
        return {
            provider: null,
            company: null,
        }
    },
    mounted() {
        this.loadProviders();
    },
    methods: {
        loadProviders() {
            axios.get("http://farmacia.test/api/provider/" + this.id)
                .then(response => {
                    console.log(response);
                    this.provider = response.data.provider;
                    this.company = response.data.company;
                })
        },
        deleteData() {
            axios.delete("http://farmacia.test/api/provider/" + this.id)
                .then(response => {
                    if (response.status === 200) {
                        this.$router.push("/provider");
                    }
                })
        },
    }
}
</script>

<style scoped lang="scss">
    $pink: #f0abae;
    $red: #bf2f50;

    .infoDrug {
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
