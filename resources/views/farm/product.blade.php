@extends('layouts.layout')
@section('title',trans('product.shop'))
@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="shop-filter">
                    <div class="col-md-6">
                        <p class="result-count">{{ trans('product.showing') }} 1–12 of 23 {{ trans('product.results') }}</p>
                    </div>
                    <div class="col-md-6">
                        <div class="shop-filter-right">
                            <div class="switch-view"><!-- 
                                <a href="shop-list.html" class="switcher" data-toggle="tooltip" data-placement="top" title="" data-original-title="List"><i class="ion-navicon"></i></a> 
                                <a href="shop.html" class="switcher active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Grid"><i class="ion-grid"></i></a> -->
                            </div>
                            <form class="commerce-ordering">
                                <select name="orderby" class="orderby">
                                    <option value="">Sort by popularity</option>
                                    <option value="">Sort by average rating</option>
                                    <option value="" selected="selected">Sort by newness</option>
                                    <option value="">Sort by price: low to high</option>
                                    <option value="">Sort by price: high to low</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="category-carousel-2 mb-3" data-auto-play="true" data-desktop="3" data-laptop="3" data-tablet="2" data-mobile="1">
                    @if(!empty($product_categories))
                        @foreach($product_categories as $single_category)
                        <div class="cat-item">
                            <div class="cats-wrap" data-bg-color="#f8c9c2">
                                <a onclick="productFilter({{ $single_category['id'] }})">
                                    <img src="images/category/cate_7.png" alt="" />
                                    <h2 class="category-title"> 
                                        {{ $single_category['title'] }} <mark class="count">({{ $single_category['product_counts'] }})</mark>
                                    </h2>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                <div class="product-grid" id="productList">
                    @if(!empty($product))
                        @foreach($product as $single_product)
                        
                        <?php $image_path = IMAGE_PATH.'shop'.'/'.$single_product['picture'] ?>

                        <div class="col-md-4 col-sm-6 product-item text-center mb-3">
                            <div class="product-thumb">
                                <a href="{{ route('product.detail',$single_product['id']) }}">
                                    <div class="badges">
                                        <span class="hot">{{ trans('product.hot') }}</span>
                                        <span class="onsale">{{ trans('product.sale') }}</span>
                                    </div> 
                                    <img src="{{ $image_path }}" alt="" />
                                </a>
                                <div class="product-action">
                                    <span class="add-to-cart">
                                        <a onclick="addCart( {{ $single_product['id'] }})" data-toggle="tooltip" data-placement="top" title="Add to cart"></a>
                                    </span>
                                    <span class="wishlist">
                                         <a onclick="addWishlist( {{ $single_product['id'] }})" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
                                    </span>
                                    <span class="quickview">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
                                    </span>
                                    <span class="compare">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
                                    </span>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('product.detail',$single_product['id']) }}">
                                    <h2 class="title">{{ $single_product['title'] }}</h2>
                                    <span class="price">
                                        <ins>{{ currency($single_product['sale_price'],$default_currency,$currency) }}</ins>
                                    </span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-3 col-md-pull-9">
                <div class="sidebar">
                    <div class="widget widget-product-search">
                        <form class="form-search">
                            <div class="input-group-btn"  style="display: inline-block; float: left; width: 40%;">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%; padding: 9px 12px;">{{ trans('product.categories') }}<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    @if(!empty($product_categories))
                                        @foreach($product_categories as $single_category)
                                            <li><a href="#">{{ $single_category['title'] }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>  

                            <span class="search-box" style="display: inline-block; float: right; width: 60%;">
                                <input type="text" class="search-field" placeholder="{{ trans('product.search_product') }}" value="" name="s" />
                                <input type="submit" value="Search" />
                            </span>
                        </form>
                    </div>
                    <div class="widget widget_price_filter">
                        <h3 class="widget-title">{{ trans('product.filter_by_price') }}</h3>
                        <div class="price_slider_wrapper">
                            <div class="price_slider" style="display:none;"></div>
                            <div class="price_slider_amount">
                                <input type="text" id="min_price" name="min_price" value="" data-min="0" placeholder="Min price"/>
                                <input type="text" id="max_price" name="max_price" value="" data-max="{{ $max_price }}" placeholder="Max price"/>
                                
                                <div class="price_label" style="display:none;">
                                    {{ trans('product.price') }}: <span class="from"></span> &mdash; <span class="to"></span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-category">
                        <h3 class="widget-title">{{ trans('product.categories') }}</h3>
                        <ul class="category-list-widget">
                            @if(!empty($product_categories))    
                                @foreach($product_categories as $single_category)
                                        <input type="checkbox" name="category[]" value="{{$single_category['id'] }}" onclick="categoryFilter({{ $single_category['id'] }})"> {{ $single_category['title'] }} ( {{ $single_category['product_counts'] }} )<br>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="widget widget-products">
                        <form id="submit_opinion">
                            <h3 class="widget-title">{{ trans('product.user_opinion') }}</h3>
                            <ul class="product-list-widget">
                                <li>
                                    <textarea name="description" id="opinion" value="" rows="5"></textarea>
                                </li>
                                <span class="help-block" id="opinion_error">
                                    
                                </span>
                            </ul>

                            <button type="submit" class="button">{{ trans('product.submit') }}</button>
                        </form>
                    </div>
                    <div class="widget widget-tags">
                        <h3 class="widget-title">{{ trans('product.product_tag') }}</h3>
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
    
    function addCart(id)
    {
        token = "{{ csrf_token() }}";
        
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
                    
                    product_count = resp.product_count;
                    $('#product_count').empty();
                    var product_count = '<div class="mini-cart-icon" data-count="'+ product_count +'"><i class="ion-bag"></i></div>';
                    $('#product_count').append(product_count);
                    
                    toastr.success('message','Product successfully added to cart.');
                },
        });
    }

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

    function categoryFilter()
    {
        var category = [];

        $.each($('input[name="category[]"][type=checkbox]:checked'), function(){            
            
            category.push($(this).val());
        });
        
        token = "{{ csrf_token() }}";
        
        $.ajax({
                url      : "{{ route('category.filter') }}",
                type     : "post",
                data     : { 'category': category,'_token': token },
                datatype : "json",

                beforeSend : function() {
                    
                },
                complete   : function() {
                },
                success    : function(resp) {
                    
                    var jsonobj = jQuery.parseJSON(resp)
                    
                    jQuery(document).find('#productList').html(jsonobj.content); 
                    
                },
        });
    }

    function productFilter(id)
    {
        token = "{{ csrf_token() }}";
        
        $.ajax({
                url      : "{{ route('category.filter') }}",
                type     : "post",
                data     : { 'id' :id,'_token': token },
                datatype : "json",

                beforeSend : function() {
                    
                },
                complete   : function() {
                },
                success    : function(resp) {
                    
                    var jsonobj = jQuery.parseJSON(resp)
                    
                    jQuery(document).find('#productList').html(jsonobj.content); 
                    
                },
        });
    }

    $("#submit_opinion").submit(function(e) {
        
        token = "{{ csrf_token() }}";
        opinion = $('#opinion').val();

        var url = "{{ route('submit.opinion') }}"; // the script where you handle the form input.
        
        $.ajax({
               type: "POST",
               url: url,
               data: {'opinion':opinion,'_token': token }, // serializes the form's elements.
               success: function(resp)
               {
                    if(resp.success == true)
                    {
                        $("#submit_opinion").empty();
                        toastr.success('message','your opinion is saved successfully.');
                    }
                    else
                    {
                        toastr.error('message','Please Login.');
                    }
                   
               },
                error: function (xhr, status, error) {
                    console.log(xhr.responseJSON.opinion[0]);
                    
                    var error = '<strong class="text-danger">' + xhr.responseJSON.opinion[0] +'</strong>';
                    $('#opinion_error').html(error);
                }
             });

        
        e.preventDefault(); // avoid to execute the actual submit of the form.
    
    });

    token = "{{ csrf_token() }}";
    filter_url = "{{ route('price.filter') }}";
</script>   
   <script type="text/javascript" src="{{ asset('jss/core.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('jss/widget.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('jss/mouse.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('jss/slider.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('jss/jquery.ui.touch-punch.js') }}"></script>
   <script type="text/javascript" src="{{ asset('jss/price-slider.js') }}"></script>
@include('layouts.alert')

@stop