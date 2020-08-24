<template>
    <div class="drugsList">

        <router-link class="button" :to="{ name: 'InsertDrug'}">
            Insert Drug
        </router-link>
        <ol>
            <li v-for="drug in drugs" :key="drug.id">
                <router-link class="link" :to="{ name: 'ViewDrug', params: { id: drug.id }}">
                    {{ drug.name }}, {{ drug.price }}
                </router-link>
            </li>
        </ol>
        <div class="message" v-if="!drugs.length">There are no drugs to show</div>
    </div>
</template>

<script>
import axios from "axios";

export default {
name: "ListDrugs",
    data(){
        return {
            drugs: [],
        };
    },
    mounted() {
        this.loadDrugs();
    },
    methods: {
        loadDrugs: function () {
            axios.get("http://farmacia.test/api/drug")
                .then(response => {
                    this.drugs = response.data;
                })
        }
    }
}
</script>

<style scoped lang="scss">
    $pink: #f0abae;
    $red: #bf2f50;

    .drugsList {
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
