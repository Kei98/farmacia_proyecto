<template>
    <div class="clientsList">

        <router-link class="button" :to="{ name: 'InsertClient'}">
            Insert Client
        </router-link>
        <ol>
            <li v-for="client in clients" :key="client.id">
                <router-link class="link" :to="{ name: 'ViewClient', params: { id: client.id }}">
                    {{ client.name }}, {{ client.id_person }}
                </router-link>
            </li>
        </ol>
        <div class="message" v-if="!clients.length">There are no clients to show</div>
    </div>
</template>

<script>
import axios from "axios";

export default {
name: "ListClient",
    data(){
        return {
            clients: [],
        };
    },
    mounted() {
        this.loadClients();
    },
    methods: {
        loadClients: function () {
            axios.get("http://farmacia.test/api/client")
                .then(response => {
                    this.clients = response.data;
                })
        }
    }
}
</script>

<style scoped lang="scss">
    $pink: #f0abae;
    $red: #bf2f50;

    .clientsList {
        border: 2px solid $red;
        width: 500px;
        margin: 0 auto;
        text-align: left;
        font-size: 30px;
        padding: 30px;
        color: $red;

        ol {
            li {
                margin: 20px auto;
            }
        }
    }

    .link {
        color: $red;
    }
</style>
