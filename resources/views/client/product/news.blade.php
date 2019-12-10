@foreach($news as $product)
    <li class="item col-lg-4 col-md-4 col-sm-4 col-xs-6">
        <div class="item-inner">
            <div class="item-img">
                <div class="item-img-info">
                    <a class="product-image image-list" href="{{ route('home.products.detail',['id' => $product->id ]) }}"><img src="{{ asset('storage/images/products/'.$product->images->first()->getAttribute('image')) }}"></a>
                    <div class="new-label new-top-left">@lang('shop.new')</div>
                </div>
            </div>
            <div class="item-info">
                <div class="info-inner">
                    <div class="item-title"><a title="Product Title Here" href="">{{ $product->name }}</a> </div>
                    <div class="item-content">
                        <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                        <div class="item-price">
                            <div class="price-box"> <span class="regular-price"> <span class="price">{{ number_format($product->price) }}</span> </span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach