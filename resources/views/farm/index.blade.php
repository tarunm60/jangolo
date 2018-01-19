@extends('layouts.layout')
@section('content')
<div id="main">
    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div id="rev_slider" class="rev_slider fullscreenbanner">
                        <ul>
                            @if(isset($banner))
                                @foreach($banner as $single_banner)
                                <?php
                                    $path = IMAGE_PATH.'slider'.'/'.$single_banner['url'];
                                ?>
                                <li data-transition="fade" data-slotamount="default" data-hideafterloop="0"  data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide">
                                    <img src="{{  asset($path) }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" />
                                    <div class="tp-caption rs-parallaxlevel-2"
                                         data-x="center" data-hoffset=""
                                         data-y="center" data-voffset="-80"
                                         data-width="['none','none','none','none']"
                                         data-height="['none','none','none','none']"
                                         data-type="image" data-responsive_offset="on"
                                         data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['inherit','inherit','inherit','inherit']"
                                         data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]">
                                            <img src="images/slider/slide_6.png" alt="" />
                                    </div>
                                    <div class="tp-caption rs-parallaxlevel-1"
                                         data-x="center" data-hoffset=""
                                         data-y="center" data-voffset="-80"
                                         data-width="['none','none','none','none']"
                                         data-height="['none','none','none','none']"
                                         data-type="image" data-responsive_offset="on"
                                         data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['inherit','inherit','inherit','inherit']"
                                         data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="images/slider/slide_7.png" alt="" />
                                    </div>
                                    <a class="tp-caption btn-2 hidden-xs" href="{{ route('farm') }}"
                                         data-x="['center','center','center','center']" 
                                         data-y="['center','center','center','center']" data-voffset="['260','260','260','260']"
                                         data-width="['auto']" data-height="['auto']"
                                         data-type="button" data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power0.easeIn","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(95,189,116);bg:rgba(51, 51, 51, 0);"}]'
                                         data-textAlign="['inherit','inherit','inherit','inherit']"
                                         data-paddingtop="[16,16,16,16]" data-paddingright="[30,30,30,30]"
                                         data-paddingbottom="[16,16,16,16]" data-paddingleft="[30,30,30,30]">
                                         {{ trans('homepage.shop_now') }}
                                    </a>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section pt-12 pb-9">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center mb-1 section-pretitle">{{ trans('homepage.discover') }}</div>
                    <h2 class="text-center section-title mtn-2">{{ trans('homepage.our_product') }}</h2>
                    <div class="organik-seperator center">
                        <span class="sep-holder"><span class="sep-line"></span></span>
                        <div class="sep-icon"><i class="organik-flower"></i></div>
                        <span class="sep-holder"><span class="sep-line"></span></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="text-center">
                        <ul class="masonry-filter">
                            <li><a href="#" data-filter="" class="active">{{ trans('homepage.all') }}</a></li>
                            @foreach($category as $single_category)
                                <li><a href="#" data-filter=".{{ $single_category['title'] }}" class="">{{ $single_category['title'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" id="load-data">
                <div class="product-grid masonry-grid-post">
                    @if(count($products))   
                    @foreach($products as $single_product)
                       
                        <div class="col-md-3 col-sm-6 col-xs-6 product-item masonry-item text-center {{ $single_product['category']['title'] }} ">
                            <div class="product-thumb">
                                <a href="{{ route('product.detail',$single_product['id']) }}">
                                        <?php
                                            $path = IMAGE_PATH.'shop'.'/'.$single_product['picture'];
                                        ?>
                                    <img src="{{ asset($path) }}" alt="" />
                                </a>
                                <div class="product-action">
                                    <span class="add-to-cart">
                                        <a onclick="addCart( {{ $single_product['id'] }})" data-toggle="tooltip" data-placement="top" title="Add to cart"></a>
                                    </span>
                                    <span class="wishlist">
                                        <a onclick="addWishlist( {{ $single_product['id'] }})" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
                                    </span>
                                    <span class="quickview hidden-xs">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
                                    </span>
                                    <span class="compare hidden-xs">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
                                    </span>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('product.detail',$single_product['id']) }}">
                                    <h2 class="title">{{ $single_product['title']}}</h2>
                                    <span class="price">
                                        <ins>{{ currency($single_product['sale_price'],$default_currency,$currency) }}</ins>
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    @endif    
                </div>
                @if(count($products))
                <div class="loadmore-contain" id="loadmore-contain">
                    <button id="load_more" class="organik-btn small" data-id="{{ $single_product['id'] }}" > Load more </button>
                </div>
                @endif
            </div>
        </div>
    </div>
     
    <div class="section border-bottom mt-6 mb-5">
        <div class="container">
            <div class="row">
                <div class="organik-process">
                    <div class="col-md-3 col-sm-6 organik-process-small-icon-step">
                        <div class="icon">
                            <i class="organik-delivery"></i>
                        </div>
                        <div class="content">
                            <div class="title">{{ trans('homepage.free_shipping') }}</div>
                            <div class="text">{{ trans('homepage.free_shipping_msg') }}</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 organik-process-small-icon-step">
                        <div class="icon">
                            <i class="organik-hours-support"></i>
                        </div>
                        <div class="content">
                            <div class="title">{{ trans('homepage.customer_support') }}</div>
                            <div class="text">{{ trans('homepage.customer_support_msg') }}</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 organik-process-small-icon-step">
                        <div class="icon">
                            <i class="organik-credit-card"></i>
                        </div>
                        <div class="content">
                            <div class="title">{{ trans('homepage.secure_payment') }}</div>
                            <div class="text">{{ trans('homepage.secure_payment_msg') }}</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 organik-process-small-icon-step">
                        <div class="icon">
                            <i class="organik-lettuce"></i>
                        </div>
                        <div class="content">
                            <div class="title">{{ trans('homepage.made_with_love') }}</div>
                            <div class="text">{{ trans('homepage.made_with_love_msg') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
               
    <div class="section pt-9">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center mb-1 section-pretitle">{{ trans('homepage.latest') }}</div>
                    <h2 class="text-center section-title mtn-2">{{ trans('homepage.from_our_blog') }}</h2>
                    <div class="organik-seperator center mb-6">
                        <span class="sep-holder"><span class="sep-line"></span></span>
                        <div class="sep-icon"><i class="organik-flower"></i></div>
                        <span class="sep-holder"><span class="sep-line"></span></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="blog-grid-item">
                        <div class="post-thumbnail">
                            <a href="#"> 
                                <img src="images/blog/blog_1.jpg" alt="" /> 
                            </a>
                        </div>
                        <div class="post-content">
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <i class="ion-calendar"></i> 
                                    <span>August 9, 2016</span>
                                </span>
                                <span class="comment">
                                    <i class="ion-chatbubble-working"></i> 0
                                </span>
                            </div>
                            <a href="#">
                                <h1 class="entry-title">How to steam &amp; purée your sugar pie pumkin</h1>
                            </a>
                            <div class="entry-content"> 
                                Cut the halves into smaller pieces and place in a large pot of water with a steam basket to keep the pumpkin pieces from touching…
                            </div>
                            <div class="entry-more">
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-grid-item">
                        <div class="post-thumbnail">
                            <a href="#"> 
                                <img src="images/blog/blog_2.jpg" alt="" /> 
                            </a>
                        </div>
                        <div class="post-content">
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <i class="ion-calendar"></i> 
                                    <span>August 9, 2016</span>
                                </span>
                                <span class="comment">
                                    <i class="ion-chatbubble-working"></i> 0
                                </span>
                            </div>
                            <a href="#">
                                <h1 class="entry-title">Great bulk recipes to help use all your organic vegetables</h1>
                            </a>
                            <div class="entry-content"> 
                                A fridge full of organic vegetables purchased or harvested with the best of intentions, and then life gets busy, leaving no time to peel,
                            </div>
                            <div class="entry-more">
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-grid-item">
                        <div class="post-thumbnail">
                            <a href="#"> 
                                <img src="images/blog/blog_1.jpg" alt="" /> 
                            </a>
                        </div>
                        <div class="post-content">
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <i class="ion-calendar"></i> 
                                    <span>August 9, 2016</span>
                                </span>
                                <span class="comment">
                                    <i class="ion-chatbubble-working"></i> 0
                                </span>
                            </div>
                            <a href="#">
                                <h1 class="entry-title">How can salmon be raised organically in fish farms?</h1>
                            </a>
                            <div class="entry-content"> 
                                Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look
                            </div>
                            <div class="entry-more">
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <hr class="mt-7 mb-3" />
                </div>
            </div>
        </div>
    </div>
    <div class="section pt-2 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="client-carousel" data-auto-play="true" data-desktop="5" data-laptop="3" data-tablet="3" data-mobile="2">
                        <div class="client-item">
                            <a href="#" target="_blank">
                                <img src="{{ IMAGE_PATH.'/partners/Cito_Bio _Nature.jpg' }}" alt="" height="120px" width="81px" />
                            </a>
                        </div>
                        <div class="client-item">
                            <a href="#" target="_blank">
                                <img src="{{ IMAGE_PATH.'/partners/kenza_market.png' }}" alt="" height="120px" width="81px" />
                            </a>
                        </div>
                        <div class="client-item">
                            <a href="#" target="_blank">
                                <img src="{{ IMAGE_PATH.'/partners/mixfoods.jpg' }}" alt="" height="120px" width="81px" />
                            </a>
                        </div>
                        <div class="client-item">
                            <a href="#" target="_blank">
                                <img src="{{ IMAGE_PATH.'/partners/sango_agri.jpg' }}" alt="" height="120px" width="81px" />
                            </a>
                        </div>
                        <div class="client-item">
                            <a href="#" target="_blank">
                                <img src="{{ IMAGE_PATH.'/partners/tanty.jpg' }}" alt="" height="120px" width="81px" />
                            </a>
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
	$(document).ready(function(){
		jQuery('.btn-2').parent().parent().parent().addClass('shop_now');
	});
	
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
                }
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

    $(document).on('click','#load_more',function(){
		
        var id = $(this).data('id');
        $("#load_more").html("Loading....");

        $.ajax({
           url : '{{ route("load.product") }}',
           method : "POST",
           data : {id:id, _token:"{{csrf_token()}}"},
           dataType : "html",
           success : function (data)
            {
            	console.log(data);
                if(data != '') 
                {
                  $('.loadmore-contain').remove();
                  $('#load-data').append(data);
                }
                else
                {
                  $('#load_more').html("No More Data");
                  // $('.loadmore-contain').remove();
                }
            }
        });
    });  
</script>
@include('layouts.alert')
@stop
