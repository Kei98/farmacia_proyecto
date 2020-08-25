<template>
    <div class="companiesList">

        <router-link class="button" :to="{ name: 'InsertCompany'}">
            Insert Company
        </router-link>
        <ol>
            <li v-for="company in companies" :key="company.id">
                <router-link class="link" :to="{ name: 'ViewCompany', params: { id: company.id }}">
                    {{ company.name }}
                </router-link>
            </li>
        </ol>
        <div class="message" v-if="!companies.length">There are no companies to show</div>
    </div>

</template>

<script>
    import axios from "axios";

export default {
    name: "ListCompanies",
    data(){
        return {
            companies: [],
        };
    },
    mounted() {
        this.loadCompanies();
    },
    methods: {
        loadCompanies: function () {
            axios.get("http://farmacia.test/api/company")
                .then(response => {
                    this.companies = response.data;
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
