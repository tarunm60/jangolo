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
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
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
