@extends('layouts.layout')
@section('title',trans('product_detail.shop_detail'))
@section('content')
<div class="section pt-7 pb-7">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-push-3">
				<div class="single-product">
					<div class="col-md-6">
						<div class="image-gallery">
							<div class="image-gallery-inner">
								<?php
                                    $path = IMAGE_PATH.'shop'.'/'.$product_detail['picture'];
                                ?>
								<div>
									<div class="image-thumb">
										<a href="{{ asset($path) }}" data-rel="prettyPhoto[gallery]">
											<img src="{{ asset($path) }}" alt="" />
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="image-gallery-nav">
							<div class="image-nav-item">
								<div class="image-thumb">
									<img src="{{ asset($path)}}" alt="" />
								</div>
							</div>
							<div class="image-nav-item">
								<div class="image-thumb">
									<img src="{{ asset($path)}}" alt="" />
								</div>
							</div>
							<div class="image-nav-item">
								<div class="image-thumb">
									<img src="{{ asset($path)}}" alt="" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="summary">
							<h1 class="product-title">{{ $product_detail['title'] }}</h1>
							<div class="product-rating">
								<div class="star-rating">
									<span style="width:100%"></span>
								</div>
								<i>2 {{ trans('product_detail.customer_review') }}</i>
							</div>
							<div class="product-price">
								<ins>{{ currency($product_detail['sale_price'],$default_currency,$currency) }}</ins>
							</div>
							@if(count($product_detail['getView']['view_count']))
								<div class="mb-3">
									<span>{{ trans('product_detail.views') }} :</span> {{ $product_detail['getView']['view_count'] }}
								</div>
							@else
								<div class="mb-3">
									<span>{{ trans('product_detail.views') }} :</span> 1
								</div>
							@endif
							<div class="mb-3">
								<p>{{ $product_detail['description'] }}</p>
							</div>

            				<?= Form::open(array('url' => route('add.cart'),'class' => 'cart')) ?>
								<div class="quantity-chooser">
									<div class="quantity">
										<span class="qty-minus" data-min="1"><i class="ion-ios-minus-outline"></i></span>
										<input type="text" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
										<input type="hidden" name="product_id" value="{{ $product_detail['id'] }}" >
										<span class="qty-plus" data-max=""><i class="ion-ios-plus-outline"></i></span>
									</div>
								</div>
								<button type="submit" class="single-add-to-cart">{{ trans('product_detail.add_to_cart') }}</button>
							<?= Form::close() ?>
							<div class="product-tool">
								<a onclick="addWishlist( {{ $product_detail['id'] }})" data-toggle="tooltip" data-placement="top" title="Add to wishlist"> {{ trans('product_detail.browse_wishlist') }} </a>
								<a class="compare" href="#" data-toggle="tooltip" data-placement="top" title="Add to compare"> {{ trans('product_detail.compare') }} </a>
							</div>
							<div class="product-meta">
								<table>
									<tbody>
										<tr>
											<td class="label">{{ trans('product_detail.category') }}</td>
											<td><a href="#">{{ $product_detail['category']['title'] }}</a></td>
										</tr>
										<tr>
											<td class="label">{{ trans('product_detail.share') }}</td>
											<?php $url = Request::url() ?>
											<td class="share">
												<a target="_blank" href="https://www.facebook.com/sharer?url={{ urlencode($url) }}"><i class="fa fa-facebook"></i></a> 
												<a target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}"><i class="fa fa-twitter"></i></a> 
												<a target="_blank" href="https://plus.google.com/share?url={{ urlencode($url) }}"><i class="fa fa-google-plus"></i></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="commerce-tabs tabs classic">
							<ul class="nav nav-tabs tabs">
								<li class="active">
									<a data-toggle="tab" href="#tab-description" aria-expanded="true">{{ trans('product_detail.description') }}</a>
								</li>
								<li class="">
									<a data-toggle="tab" href="#tab-reviews" aria-expanded="false">{{ trans('product_detail.review') }}</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab-description">
									<p>
										Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
									</p>
								</div>
								<div id="tab-reviews" class="tab-pane fade">
									<div class="single-comments-list mt-0">
										<div class="mb-2">
											<h2 class="comment-title">2 {{ trans('product_detail.reviews_for') }} {{ $product_detail['title'] }}</h2>
										</div>
									</div>
									<div class="single-comment-form mt-0">
										<div class="mb-2">
											<h2 class="comment-title">{{ trans('product_detail.leave_reply') }}</h2>
										</div>
										<form class="comment-form">
											<div class="row">
												<div class="col-md-12">
													<textarea id="comment" name="comment" cols="45" rows="5" placeholder="Message *"></textarea>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<input id="author" name="author" type="text" value="" size="30" placeholder="Name *" class="mb-2">
												</div>
												<div class="col-md-4">
													<input id="email" name="email" type="email" value="" size="30" placeholder="Email *" class="mb-2">
												</div>
												<div class="col-md-4">
													<input id="url" name="url" type="text" value="" placeholder="Website">
												</div>
											</div>
											<div class="row">
												<div class="col-md-2">
													<input name="submit" type="submit" id="submit" class="btn btn-alt btn-border" value="Submit">
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						@if(count($related_products))
						<div class="related">
							<div class="related-title">
								<div class="text-center mb-1 section-pretitle fz-34">{{ trans('product_detail.related') }}</div>
								<h2 class="text-center section-title mtn-2 fz-24">{{ trans('product_detail.products') }}</h2>
							</div>
							<div class="product-carousel p-0" data-auto-play="true" data-desktop="3" data-laptop="2" data-tablet="2" data-mobile="1">
									@foreach($related_products as $single_related_products)
									<div class="product-item text-center">
										<div class="product-thumb">
											<?php
                                                $related_product_path = IMAGE_PATH.'shop/thumb'.'/'.$single_related_products['picture'];
                                            ?>
											<a href="{{  route('product.detail',$single_related_products['id']) }}">
												<div class="badges">
													<span class="hot">{{ trans('product_detail.hot') }}</span>
												</div>
												<img src="{{ asset($related_product_path) }}" alt="" />
											</a>
											<div class="product-action">
												<span class="add-to-cart">
													<a href="#" data-toggle="tooltip" data-placement="top" title="{{ trans('product_detail.add_to_cart')}}"></a>
												</span>
												<span class="wishlist">
													<a href="#" data-toggle="tooltip" data-placement="top" title="{{ trans('product_detail.add_to_wishlist')}}"></a>
												</span>
												<span class="quickview">
													<a href="#" data-toggle="tooltip" data-placement="top" title="{{ trans('product_detail.quickview')}}"></a>
												</span>
												<span class="compare">
													<a href="#" data-toggle="tooltip" data-placement="top" title="{{ trans('product_detail.compare')}}"></a>
												</span>
											</div>
										</div>
										<div class="product-info">
											<a href="{{  route('product.detail',$single_related_products['id']) }}">
												<h2 class="title">{{ $single_related_products['title'] }}</h2>
												<span class="price">{{ currency($single_related_products['sale_price'],$default_currency,$currency) }}</span>
											</a>
										</div>
									</div>
									@endforeach
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="col-md-3 col-md-pull-9">
				<div class="sidebar">
					<div class="widget widget-product-search">
						<form class="form-search">
							<div class="input-group-btn"  style="display: inline-block; float: left; width: 40%;">
	                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%; padding: 9px 12px;">Categories <span class="caret"></span>
	                            </button>
	                            <ul class="dropdown-menu">
	                                @foreach($product_category as $single_category)
										<li><a href="#">{{ $single_category }}</a></li>
									@endforeach
	                            </ul>
	                        </div>	
	                        <span class="search-box" style="display: inline-block; float: right; width: 60%;">
	                        	<input type="text" class="search-field" placeholder="Search products…" value="" name="s" />
								<input type="submit" value="Search" />
	                        </span>
						</form>
					</div>
					
					@if(count($related_products))
					<div class="widget widget-products">
						<h3 class="widget-title">{{ trans('product_detail.products') }}</h3>
						<ul class="product-list-widget">
							@foreach($related_products as $single_related_products)
							<?php
                                $related_product_path = IMAGE_PATH.'shop/thumb'.'/'.$single_related_products['picture'];
                            ?>

							<li>
								<a href="{{ route('product.detail',$single_related_products['id'] )}}">
									<img src="{{ $related_product_path }}" alt="" />
									<span class="product-title">{{ $single_related_products['title'] }}</span>
								</a>
								<ins>{{ currency($single_related_products['sale_price'],$default_currency,$currency) }}</ins>
							</li>
							@endforeach
						</ul>
					</div>
					@endif
					<div class="widget widget-tags">
						<h3 class="widget-title">{{ trans('product_detail.product_tag') }}</h3>
						<div class="tagcloud">
							<a href="#">bread</a> <a href="#">food</a> <a href="#">fruits</a> <a href="#">green</a> <a href="#">healthy</a> <a href="#">natural</a> <a href="#">organic store</a> <a href="#">vegatable</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	function addWishlist(id)
    {
        token = "{{ csrf_token() }}";
        $.ajax({
                url      : "{{ route('add.wishlist') }}",
                type     : "post",
                data     : { "product_id" : id, '_token': token },
                datatype : "json",

                beforeSend : function() {
                    
                },
                complete   : function() {
                },
                success    : function(resp) {

                    if(resp.success == true)
                    {
                        toastr.success('message','Product added to wishlist.');
                    }
                    else
                    {
                        toastr.error('message','Please Login or Register to add product to your wishlist.');
                    }
                    
                }
        });
    }

    $(window).load(function() {
    	productId = " {{ request()->segment(3) }}";
    	
    	token = "{{ csrf_token() }}";
        $.ajax({
                url      : "{{ route('product.count') }}",
                type     : "post",
                data     : { "product_id" : productId, '_token': token },
                datatype : "json",

                beforeSend : function() {
                    
                },
                complete   : function() {
                },
                success    : function(resp) {

                }
        });
    });

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.share > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>	
@stop
