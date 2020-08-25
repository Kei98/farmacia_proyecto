<template>
    <div v-if="drug !== null" class="infoDrug">

        <h4>ID: <span>{{ drug.id }}</span></h4>
        <h4>Name: <span>{{ drug.name }}</span></h4>
        <h4>Description: <span>{{ drug.description }}</span></h4>
        <h4>Administration: <span>{{ drug.administration }}</span></h4>
        <h4>Price: <span>{{ drug.price }}</span></h4>
        <h4>Provider ID: <span> <router-link class="button" :to="{ name: 'ViewProvider', params: { id: drug.id_provider }}">
            {{ provider.id }}, {{ provider.name }}</router-link></span></h4>


        <router-link class="button" :to="{ name: 'ModifyDrug', params: { id: drug.id }}">Modify</router-link>
        <button class="button" @click="deleteData">Delete</button>
        <router-link class="button" :to="{ name: 'ListDrugs' }">Go back</router-link>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ViewDrug",
    props: {
        id: [String, Number]
    },
    data() {
        return {
            drug: null,
            provider: null,
        }
    },
    mounted() {
        this.loadDrug();
    },
    methods: {
        loadDrug() {
            axios.get("http://farmacia.test/api/drug/" + this.id)
                .then(response => {
                    console.log(response);
                    this.drug = response.data.drug;
                    this.provider = response.data.provider;
                })
        },
        deleteData() {
            axios.delete("http://farmacia.test/api/drug/" + this.id)
                .then(response => {
                    if (response.status === 200) {
                        this.$router.push("/home");
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
