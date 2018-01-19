<template>
    <div class="container">
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Panier</h4>
                    </div>
                    <div class="modal-body" v-if="typeof(order.items) != 'undefined'">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="font-size: 20px">Product(s)</th>
                                <th style="font-size: 20px">Product(s)</th>
                                <th style="font-size: 20px">Quantité</th>
                                <th style="font-size: 20px">Prix</th>
                            </tr>
                            </thead>
                            <tbody v-for="tab in order.items">
                            <tr>

                                <td style="font-size: 18px">
                        <img :src="'http://media.jangolo.cm/products/500/'+ tab.product.picture"
                                         style="vertical-align: bottom"
                                         width="50px">

                                </td>
                                <td style="font-size: 16px">
                                    {{tab.product.title}}
                                </td>
                                <td>
                                    <div class=" input-group col-sm-12 col-md-3 col-xs-5">
                                        <div class="row">
                                            <div class="col-lg-2 col-xs-3 fa fa-minus-square fa-2x"
                                                 @click="remove(tab)"
                                                 style="padding-top: 3px;">
                                            </div>
                                            <div class="col-lg-8 col-xs-6 "
                                                 style="padding-top: 5px; text-align: center;" v-text="tab.quantity">
                                            </div>

                                            <div class="col-lg-2 col-xs-3 fa fa-plus-square  fa-2x"
                                                 @click="add(tab)"
                                                 style="padding-top: 3px">

                                            </div>
                                        </div>

                                    </div>
                                </td>
                                <td style="font-size: 18px"> {{lineTotal(tab)}} F</td>

                            </tr>
                            </tbody>
                        </table>
                        <p style="font-size: 20px">Total :{{orderTotal()}} F </p>
                     <a href="">   <button type="button" class="btn btn-success" >Commander</button></a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Continuer le shopping</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['order'],
        data: function () {
            return {
                products: [],
                cardProducts: []
            }
        },
        mounted: function () {
        },

        methods: {

            add: function (item) {

                item.quantity++;
                window.main.$emit('add-product', item.product)
            },
            remove: function (item) {
                if(item.quantity===1){
                    this.order.items.splice(this.order.items.indexOf(item), 1);
                    this.apply;
                }
                else
                    item.quantity--;
                window.main.$emit('remove-product', item.product)
            },
            deleteItem: function () {

            },
            lineTotal: function (item) {
                return item.value * item.quantity;
            },
            orderTotal: function () {
                var total = 0;

                this.order.items.forEach(function(item) {
                    total += item.value * item.quantity;
                });

                return total;
            }

        }
    }
</script>
