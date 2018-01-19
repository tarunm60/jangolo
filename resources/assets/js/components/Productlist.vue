<template>
    <div>
    <product v-for="product in products" :product="product">

    </product>
    </div>
</template>

<script>
    export default {

        data: function () {
            return {
                products: [],
                cardProducts: []
            }
        },
        mounted: function () {
            this.fetchProducts();
        },

        methods: {

            fetchProducts: function () {
                axios.get('/api/homeproducts').then(function (response) {
                    this.products = response.data.products;
                    this.list = response.data.products;
                }.bind(this));
            },
        }
    }
</script>
