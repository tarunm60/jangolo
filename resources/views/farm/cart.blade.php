@extends('layouts.layout')
@if(!empty($product_detail))
<div class="full_cart">
    @section('title',trans('cart.cart'))
    @section('content')
    <div class="section pt-7 pb-7">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <table class="table shop-cart">
                        <tbody>
                        @if(!empty($product_detail))
                            @foreach($product_detail as $single_product)
                            <tr class="cart_item">
                                <td class="product-remove">
                                    <a onclick="deleteProduct({{ $single_product['id'] }},this)" class="remove">×</a>
                                </td>
                                <?php
                                    $path = IMAGE_PATH.'shop/thumb'.'/'.$single_product['picture'];
                                ?>
                                <td class="product-thumbnail">
                                    <a href="{{ route('product.detail',$single_product['id'] )}}">
                                        <img src="{{ $path }}" alt="">
                                    </a>
                                </td>
                                <td class="product-info">
                                    <a href="{{ route('product.detail',$single_product['id'] )}}">{{ $single_product['title'] }}</a>
                                    <span class="sub-title">{{ str_limit($single_product['description'],10) }}</span>
                                    <span class="amount" id="amount" name="price" value="{{ currency($single_product['sale_price'],$default_currency,$currency) }}">{{ currency($single_product['sale_price'],$default_currency,$currency) }}</span>
                                    <input type="hidden" name="product_id" id="product_id" value="{{ $single_product['id'] }}">
                                </td>

                                <td class="cart-page">
                                    <div class="quantity-chooser">
                                        <div class="quantity">
                                            <span class="qty-minus" data-min="1"><i class="ion-ios-minus-outline"></i></span>
                                            <input id="qty" type="text" min="1" name="qty" value="{{ $single_product['quantity'] }}" class="input-text qty text" size="2">
                                            <span class="qty-plus" data-max=""><i class="ion-ios-plus-outline"></i></span>
                                        </div>
                                    </div>
                                </td> 
                                <td class="product-subtotal">
                                    <span class="amount" id="sub_total">{{ currency($single_product['subTotal'],$default_currency,$currency) }} </span> 
                                </td>
                            </tr>
                            @endforeach
                        @endif    
                            <tr>
                                <td colspan="5" class="actions">
                                    <a class="continue-shopping" href="{{ route('farm') }}">{{ trans('cart.continue_shopping') }}</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="cart-totals">
                        <table>
                            <tbody>
                                <tr class="shipping">
                                    <th>{{ trans('cart.shpping') }}</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr class="order-total">
                                    <th>{{ trans('cart.total_amount') }}</th>
                                    <td><strong id="total_amount">{{ currency($total_amount,$default_currency,$currency) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="proceed-to-checkout">
                            <a href="{{ route('get.checkout') }}">{{ trans('cart.proceed_checkout') }}</a>
                        </div>
                    </div>
                    <div class="coupon-shipping">
                        <div class="coupon">
                            <form>
                                <input type="text" name="coupon_code" class="coupon-code" id="coupon_code" value="" placeholder="Coupon code" />
                                <input type="submit" class="apply-coupon" name="apply_coupon" value="Apply Coupon" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</div>
@else
<div class="empty_cart">
    @section('title',trans('cart.empty_cart'))
    @section('content')
    <div class="section pt-7 pb-7">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="commerce">
                        <p class="cart-empty"> {{ trans('cart.empty_cart_msg') }}</p>
                        <a class="organik-btn small" href="{{ route('farm') }}"> {{ trans('cart.return') }} </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</div>
@endif
@section('script')
<script type="text/javascript">
 jQuery(document).ready(function(){    

    jQuery('.ion-ios-minus-outline').click(function(){
        var THIS = jQuery(this)
        setTimeout(function(){ THIS.closest('.quantity').find('.input-text.qty').trigger('change'); }, 200);
    })
    jQuery('.ion-ios-plus-outline').click(function(){
        var THIS = jQuery(this)
        setTimeout(function(){ THIS.closest('.quantity').find('.input-text.qty').trigger('change'); }, 200);
    })
    
    jQuery('.input-text.qty').on('change',function(){
        
        var THIS = jQuery(this);

        var qty = $(this).val();

        var productId = jQuery(this).closest('.cart_item').find('.product-info #product_id').val(); 
        
        token = "{{ csrf_token() }}";
        
        $.ajax({
                url      : "{{ route('update.cart') }}",
                type     : "post",
                data     : {
                                'product_id' : productId,
                                'qty' : qty,
                                '_token': token
                            },
                datatype : "json",

                beforeSend : function() {
                    
                },
                complete   : function() {
                },
                success    : function(resp) {
                
                    if(resp.product_detail == null){

                        THIS.closest('.cart_item').slideDown().remove();
                    
                    }else{
                        console.log(resp.product_detail.subTotal);
                    var amount = resp.product_detail.subTotal;

                    THIS.closest('.cart_item').find('#sub_total').html(amount);

                    }
                    
                    // var total_amount = 0;
                    // jQuery(document).find('.product-subtotal .amount').each(function(){
                        
                    //     var currentamount = eval(jQuery(this).html().replace(/[A-Za-z$-]/g, "")); 
                    //     console.log(currentamount);
                    //     total_amount += currentamount;

                    // });

                    if(total_amount == 0){

                        $('.full_cart').hide();
                        $('.empty_cart').show();
                    
                    }else{

                        jQuery(document).find('.order-total #total_amount').html(resp.product_detail.total_amount);
                    }

                    $('#product_count').empty();
                    
                    var product_count = '<div class="mini-cart-icon" data-count="'+ resp.product_count +'"><i class="ion-bag"></i></div>';
                    $('#product_count').append(product_count);
                    
                    toastr.success('message','Cart updated successfully.');
                }
        });
    });
    
})



 function deleteProduct(id,ele)
 {
    var THIS = jQuery(ele);
    
    token = "{{ csrf_token() }}";
        
        $.ajax({
                url      : "{{ route('delete.cart') }}",
                type     : "post",
                data     : {
                                'product_id' : id,
                                '_token': token
                            },
                datatype : "json",

                beforeSend : function() {
                    
                },
                complete   : function() {

                },
                success    : function(resp) {
                console.log(resp);
                console.log(THIS.closest('.cart_item'));
                console.log(resp.total_amount);
                var show_empty_cart = parseInt(resp.total_amount);
                THIS.closest('.cart_item').slideDown().remove();
                
                $('#product_count').html('<div class="mini-cart-icon" data-count='+ resp.product_count +'><i class=ion-bag></i></div>');  
                // var total_amount = 0;
                // jQuery(document).find('.product-subtotal .amount').each(function(){
                    
                //     var currentamount = parseInt(jQuery(this).html());
                //     total_amount += currentamount;
                // });
                jQuery(document).find('.order-total #total_amount').html(resp.total_amount);
                    
                if(show_empty_cart == 0)
                {
                    location.reload();
                }

                toastr.success('message','Product removed from cart.');

                }
        });
 }
</script>
@include('layouts.alert')
@stop
