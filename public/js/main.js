Vue.component('product',{
    props: ['product'],
    template: '' +
    '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="col-lg-12 col-md-12">\n' +
    '                <div class="" align="center" style="margin-top: 5px">\n' +
    '                    <a :href="\'product/\' + product.id" v-show="product.picture != \'\'">\n' +
    '                        <img :src="\'http://media.jangolo.cm/products/500/\'+ product.picture" width="100px">\n' +
    '                    </a>\n' +
    '                </div>\n' +
    '            </div>\n' +
    '            <div class="col-lg-12 col-md-12" align="center">\n' +
    '                <span class="visible-lg visible-md"\n' +
    '                      style="font-size: 0.8em; font-weight: bold">@{{product.title}}</span>\n' +
    '                <span class="visible-xs visible-sm"\n' +
    '                      style="font-size: 0.7em; font-weight: bold">@{{product.title}}</span>\n' +
    '            </div>\n' +
    '            <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">\n' +
    '\n' +
    '\n' +
    '                <button class="btn btn-block btn-success my-cart-btn" :data-id="product.id"\n' +
    '                        :data-name="product.title"\n' +
    '                        :data-summary="product.description" :data-price="product.sale_price" data-quantity="1"\n' +
    '                        :data-image="product.picture" @click="onProductAdded(product)">\n' +
    '                    <span class="text-success"\n' +
    '                          style="font-size: 1em;color: #fff;text-align: right">\n' +
    '                        @{{product.sale_price}}F | <i class="fa fa-1x fa-shopping-basket"></i>\n' +
    '                    </span>\n' +
    '                </button>\n' +
    '            </div></div>',
    methods: {
        onProductAdded: function (product) {
            this.$emit('added',this.product);
        }
    }
});

Vue.component('product-list',{
    props: ['title','body'],
    template: '' +
    '<div>' +
    '<product v-for="product in products" :product="product" @added="onProductAdded"></product>' +
    '</div>',
    data: function () {
        return {
            products:[],
            cardProducts: []
        }
    },
    mounted: function () {
        this.fetchProducts();
    },

    methods: {

        fetchProducts: function () {
            axios.get('/api/products').then(function (response) {
                this.products = response.data.products;
                this.list = response.data.products;
                console.log(response);
            }.bind(this));
        },
        onProductAdded: function (product) {
            this.cardProducts.push(product);
//                this.$emit('added',this.product);
        }


    }
});




var app = new Vue({
    el: '#root',
    data: {
        newProduct: {title: '', description: ''},
        message: 'Hello Bertrand',
        names: ['Jean', 'Mary', 'Jack'],
        products: [],
        basket: [],
        list: [],
        title: 'Mon bouton'
    },
    mounted: function () {
    },
    ready: function () {
        this.fetchProducts();
    },
    methods: {


        onProductAdded: function (product) {
            this.basket.push(product);
        }

    },
    computed: {
        categoryProducts: function(catId) {
            return this.list.filter(function (t) {
                return t.category_id === catId;
            })
        }

    }
})