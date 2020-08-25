<template>
    <div class="providersList">

        <router-link class="button" :to="{ name: 'InsertProvider'}">
            Insert Provider
        </router-link>
        <ol>
            <li v-for="provider in providers" :key="provider.id">
                <router-link class="link" :to="{ name: 'ViewProvider', params: { id: provider.id }}">
                    {{ provider.name }}, {{ provider.phone_number }}
                </router-link>
            </li>
        </ol>
        <div class="message" v-if="!providers.length">There are no providers to show</div>
    </div>
</template>

<script>
    import axios from "axios";

export default {
name: "ListProviders",
    data(){
        return {
            providers: [],
        };
    },
    mounted() {
        this.loadProviders();
    },
    methods: {
        loadProviders: function () {
            axios.get("http://farmacia.test/api/provider")
                .then(response => {
                    this.providers = response.data;
                })
        }
    }
}
</script>

<style scoped lang="scss">
    $pink: #f0abae;
    $red: #bf2f50;

    .providersList {
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
