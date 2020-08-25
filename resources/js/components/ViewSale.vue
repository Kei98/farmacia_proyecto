<template>
    <div v-if="sale !== null" class="infoSale">

        <h4>ID: <span>{{ sale.id }}</span></h4>
        <h4>Date: <span>{{ sale.date }}</span></h4>
        <h4>Discount: <span>{{ sale.discount }}</span></h4>
        <h4>Tax: <span>{{ sale.tax }}</span></h4>
        <h4>Final amount: <span>{{ sale.final_amount }}</span></h4>
        <h4>Staff ID: <span>{{ sale.id_staff }}</span></h4>
        <h4>Client ID: <span>
            <router-link class="button" :to="{ name: 'ViewClient', params: { id: sale.id_client }}">
            {{ client.id }}</router-link>
        </span></h4>


        <router-link class="button" :to="{ name: 'ModifySale', params: { id: sale.id }}">Modify</router-link>
        <button class="button" @click="deleteData">Delete</button>
        <router-link class="button" :to="{ name: 'ListSales' }">Go back</router-link>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ViewSale",
    props: {
        id: [String, Number]
    },
    data() {
        return {
            sale: null,
            client: null,
        }
    },
    mounted() {
        this.loadSale();
    },
    methods: {
        loadSale() {
            axios.get("http://farmacia.test/api/sale/" + this.id)
                .then(response => {
                    console.log(response);
                    this.sale = response.data.sale;
                    this.client = response.data.client;
                })
        },
        deleteData() {
            axios.delete("http://farmacia.test/api/sale/" + this.id)
                .then(response => {
                    if (response.status === 200) {
                        this.$router.push("/sale");
                    }
                })
        },
    }
}
</script>

<style scoped lang="scss">
    $pink: #f0abae;
    $red: #bf2f50;

    .infoSale {
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
        .mensaje{
            font-size: 20px;
        }
    }
</style>
