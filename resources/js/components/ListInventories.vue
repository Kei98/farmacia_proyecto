<template>
    <div class="inventoriesList">

        <router-link class="button" :to="{ name: 'InsertInventory'}">
            Insert Inventory
        </router-link>
        <ol>
            <li v-for="inventory in inventories" :key="inventory.id">
                <router-link class="link" :to="{ name: 'ViewInventory', params: { id: inventory.id }}">
                    {{ inventory.amount }}, {{ inventory.id_drug }}
                </router-link>
            </li>
        </ol>
        <div class="message" v-if="!inventories.length">There are no inventories to show</div>
    </div>
</template>

<script>
import axios from "axios";

export default {
name: "ListInventories",
    data(){
        return {
            inventories: [],
        };
    },
    mounted() {
        this.loadInventories();
    },
    methods: {
        loadInventories: function () {
            axios.get("http://farmacia.test/api/inventory")
                .then(response => {
                    this.inventories = response.data;
                })
        }
    }
}
</script>

<style scoped lang="scss">
    $pink: #f0abae;
    $red: #bf2f50;

    .inventoriesList {
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
