<template>
    <div v-if="inventory !== null" class="infoInventory">

        <h4>ID: <span>{{ inventory.id }}</span></h4>
        <h4>Amount: <span>{{ inventory.amount }}</span></h4>
        <h4>Drug ID: <span> <router-link class="button" :to="{ name: 'ViewDrug', params: { id: inventory.id_drug }}">
            {{ drug.id }}, {{ drug.name }}</router-link></span></h4>


        <router-link class="button" :to="{ name: 'ModifyInventory', params: { id: inventory.id }}">Modify</router-link>
        <button class="button" @click="deleteData">Delete</button>
        <router-link class="button" :to="{ name: 'ListInventories' }">Go back</router-link>
    </div>
</template>

<script>
import axios from "axios";

export default {
name: "ViewInventory",
    props: {
        id: [String, Number]
    },
    data() {
        return {
            inventory: null,
            drug: null,
        }
    },
    mounted() {
        this.loadInventory();
    },
    methods: {
        loadInventory() {
            axios.get("http://farmacia.test/api/inventory/" + this.id)
                .then(response => {
                    console.log(response);
                    this.inventory = response.data.inventory;
                    this.drug = response.data.drug;
                })
        },
        deleteData() {
            axios.delete("http://farmacia.test/api/inventory/" + this.id)
                .then(response => {
                    if (response.status === 200) {
                        this.$router.push("/inventory");
                    }
                })
        },
    }
}
</script>

<style scoped lang="scss">
    $pink: #f0abae;
    $red: #bf2f50;

    .infoInventory {
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
