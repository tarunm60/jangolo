@extends('layouts.layout')
@section('content')
@if(!empty($wishlist) && isset($wishlist))
@section('title',trans('wishlist.wishlist'))
<div class="section pt-7 pb-7">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="wishlist-wrap">
				<table class="table shop-cart">
					<thead>
						<tr class="cart_item">
							<td class="product-remove">&nbsp;</td>
							<td class="product-thumbnail">&nbsp;</td>
							<td class="product-info">{{ trans('wishlist.product_name') }}</td>
							<td class="product-subtotal">{{ trans('wishlist.unit_price') }}</td>
							<td class="product-stock">{{ trans('wishlist.stock_status') }}</td>
							<td>&nbsp;</td>
						</tr>
					</thead>
					<tbody>
					@if(!empty($wishlist))
					@foreach($wishlist as $single_product)
						<tr class="cart_item">
							<td class="product-remove">
                                <a onclick="deleteProduct({{ $single_product['id'] }},this)" class="remove">×</a>
                            </td>
							<td class="product-thumbnail">
								<a href="#">
									<?php
			                            $path = IMAGE_PATH.'shop/thumb'.'/'.$single_product['picture'];
			                        ?>
									<img src="{{ $path }}" alt="">
								</a>
							</td>
							<td class="product-info">
								<a href="{{ route('product.detail',$single_product['id'] )}}">{{ $single_product['title'] }}</a>
								<span class="sub-title">{{ str_limit($single_product['description'],10) }}</span>
								<span class="amount">{{ currency($single_product['sale_price'],$default_currency,$currency) }}</span>
							</td>
							<td class="product-subtotal">
								<span class="amount">{{ currency($single_product['sale_price'],$default_currency,$currency) }}</span>
							</td>
							<td class="product-stock">
								<span class="color">{{ trans('wishlist.stock_status') }}</span>
							</td>
							<td>
								<a class="organik-btn small" onclick="addCart( {{ $single_product['id'] }},this)">{{ trans('wishlist.add_to_cart') }} </a>
							</td>
						</tr>
					@endforeach	
					@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
@else
@section('title',trans('wishlist.empty_wishlist'))
<div class="section pt-7 pb-7" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="commerce">
                    <p class="cart-empty"> {{ trans('wishlist.empty_wishlist_msg') }}</p>
                    <a class="organik-btn small" href="{{ route('farm') }}"> {{ trans('wishlist.return') }} </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

<script type="text/javascript">

	function deleteProduct(id,ele)
 {
    var THIS = jQuery(ele);
    var total = "{{ count($wishlist) }}";
    token = "{{ csrf_token() }}";
        
        $.ajax({
                url      : "{{ route('delete.wishlist') }}",
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
                
                var show_empty_cart = parseInt(resp.total_amount);
                THIS.closest('.cart_item').slideDown().remove();
                
                if(total == 0)
                {
                    location.reload();
                }

                toastr.success('message','Product removed from cart.');

                }
        });
 }
	
	function addCart(id,ele)
    {
        token = "{{ csrf_token() }}";
        var THIS = jQuery(ele);
        var total = "{{ count($wishlist) }}";
        $.ajax({
                url      : "{{ route('add.cart') }}",
                type     : "post",
                data     : { "product_id" : id, '_token': token },
                datatype : "json",

                beforeSend : function() {
                    
                },
                complete   : function() {
                },
                success    : function(resp) {
                    
                    
	                var show_empty_cart = parseInt(resp.total_amount);
	                THIS.closest('.cart_item').slideDown().remove();
	                   
	                if(total == 0)
	                {
	                    location.reload();
	                }
                    toastr.success('message','Product successfully added to cart.');
                },
        });
    }
</script>