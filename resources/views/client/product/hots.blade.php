@foreach($hots as $hot)
    <li class="item col-lg-4 col-md-4 col-sm-4 col-xs-6">
        <div class="item-inner">
            <div class="item-img">
                <div class="item-img-info">
                    <a class="product-image image-list" href="{{ route('home.products.detail', $hot['product']->id) }}"><img class="img-responsive" src="{{ asset('storage/images/products/'.$hot['product']->images->first()->image) }}"></a>
                </div>
            </div>
            <div class="item-info">
                <div class="info-inner">
                    <div class="item-content">
                        <div class="rating">
                            @for($i=1 ; $i<5; $i++)
                                @if ($i<=round($hot['rate']))
                                    <i class="fa fa-star"></i>
                                @else
                                    <i class="fa fa-star-o"></i>
                                @endif
                            @endfor
                        </div>
                        <div class="item-title"><a href="">{{ $hot['product']->name }}</a></div>
                        <div class="item-price">
                            <div class="price-box">
                                <p class="special-price"><span id="product-price-48" class="price">{{ money_format('%.2n', $hot['product']->price_sale) }}</span></p>
                                <p class="old-price"><span class="price">{{ money_format('%.2n', $hot['product']->price) }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach
