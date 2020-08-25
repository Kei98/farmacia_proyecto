<template>
    <div class="salesList">

        <router-link class="button" :to="{ name: 'InsertSale'}">
            Insert Sale
        </router-link>
        <ol>
            <li v-for="sale in sales" :key="sale.id">
                <router-link class="link" :to="{ name: 'ViewSale', params: { id: sale.id }}">
                    {{ sale.date }}, {{ sale.final_amount }}
                </router-link>
            </li>
        </ol>
        <div class="message" v-if="!sales.length">There are no sales to show</div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ListSales",
    data() {
        return {
            sales: [],
        };
    },
    mounted() {
        this.loadSales();
    },
    methods: {
        loadSales: function () {
            axios.get("http://farmacia.test/api/sale")
                .then(response => {
                    this.sales = response.data;
                })
        }
    }
}
</script>

<style scoped lang="scss">
    $pink: #f0abae;
    $red: #bf2f50;

    .salesList {
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
