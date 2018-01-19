/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('product', require('./components/Product.vue'));
Vue.component('product-list', require('./components/Productlist.vue'));
Vue.component('cart-order', require('./components/Cartdetails.vue'));
window.main = new Vue();
window.main.order = {};


var app = new Vue({
    el: '#root',
    data: {
        newProduct: {title: '', description: ''},
        message: 'Hello Bertrand',
        names: ['Jean', 'Mary', 'Jack'],
        products: [],
        list: [],
        title: 'Mon bouton',
        order: {},
        items:{}
    },
    mounted: function () {

        this.fetchCart();

        window.main.$on('add-product', function (product) {
            axios.get('/cart/add/' + product.id + '/1').then(function (response) {
                this.order = response.data.order;
                this.apply;
            }.bind(this));
        });
        window.main.$on('remove-product', function (product) {
            axios.get('/cart/remove/' + product.id + '/1').then(function (response) {
                this.order = response.data.order;
                this.items = response.data.order.items.refresh;
                this.apply;
                this.refresh;
            }.bind(this));
        });


    },
    ready: function () {
        this.fetchCart();
    },
    methods: {

        fetchCart: function () {
            axios.get('/cart/').then(function (response) {
                this.order = response.data.order;
                this.items = this.order.items;
            }.bind(this));
        },

        addNewProduct: function (orderitem) {
            var newProduct = true;
            if(orderitem != null){
                this.order.items.forEach(function(item) {
                    if(item.product.id === orderitem.product.id){
                        item.quantity++;
                        newProduct = false;
                    }
                });
                if(newProduct){
                    this.order.items.push(orderitem);
                }
            }

        }

    },
    computed: {
        categoryProducts: function (catId) {
            return this.list.filter(function (t) {
                return t.category_id === catId;
            })
        }

    }
});

