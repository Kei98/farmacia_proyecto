<template>
    <div v-if="client !== null" class="infoClient">

        <h4>ID: <span>{{ client.id }}</span></h4>
        <h4>Name: <span>{{ client.name }}</span></h4>
        <h4>Person ID:: <span>{{ client.id_person}}</span></h4>
        <h4>Telephone number: <span>{{ client.tel_number }}</span></h4>

        <router-link class="button" :to="{ name: 'ModifyClient', params: { id: client.id }}">Modify</router-link>
        <button class="button" @click="deleteData">Delete</button>
        <router-link class="button" :to="{ name: 'ListClients' }">Go back</router-link>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ViewClient",
    props: {
        id: [String, Number]
    },
    data() {
        return {
            drug: null,
        }
    },
    mounted() {
        this.loadClient();
    },
    methods: {
        loadClient() {
            axios.get("http://farmacia.test/api/client/" + this.id)
                .then(response => {
                    console.log(response);
                    this.client = response.data.client;
                })
        },
        deleteData() {
            axios.delete("http://farmacia.test/api/client/" + this.id)
                .then(response => {
                    if (response.status === 200) {
                        this.$router.push("/client");
                    }
                })
        },
    }
}
</script>

<style scoped lang="scss">
    $pink: #f0abae;
    $red: #bf2f50;

    .infoClient {
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
