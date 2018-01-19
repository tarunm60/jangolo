<template>
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
        <div class="col-lg-12 col-md-12">
            <div class="" align="center" style="margin-top: 5px">

                <a :href="'product/' +  product.title" v-show="product.picture != ''">
                    <img :src="'http://media.jangolo.cm/products/500/'+ product.picture" width="100px">
                </a>
            </div>
        </div>
        <div class="col-lg-12 col-md-12" align="center">
                        <span class="visible-lg visible-md"
                              style="font-size: 0.8em; font-weight: bold">{{product.title}}</span>
            <span class="visible-xs visible-sm"
                  style="font-size: 0.7em; font-weight: bold">{{product.title}}</span>
        </div>
        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <button class="btn btn-block btn-success my-cart-btn" :data-id="product.id"
                    :data-name="product.title"
                    :data-summary="product.description" :data-price="product.sale_price" data-quantity="1"
                    :data-image="product.picture" @click="onProductAdded(product)">
                            <span class="text-success"
                                  style="font-size: 1em;color: #fff;text-align: right">
                                {{product.sale_price}}F | <i class="fa fa-1x fa-shopping-basket"></i>
                          </span>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product'],
        methods: {
            onProductAdded: function (product) {
                window.main.$emit('add-product', product)
            }
        }
    }
</script>
