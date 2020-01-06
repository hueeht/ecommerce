@foreach($hots as $product)
    <li class="item col-lg-4 col-md-4 col-sm-4 col-xs-6">
        <div class="item-inner">
            <div class="item-img">
                <div class="item-img-info">
                    <a class="product-image image-list" href="{{ route('home.products.detail',['id' => $product->first()->id ]) }}"><img class="img-responsive" src="{{ asset('storage/images/products/'.$product->first()->images->first()->image) }}"> </a>
                    <div class="action">
                    </div>
                </div>
            </div>
            <div class="item-info">
                <div class="info-inner">
                    <div class="item-content">
                        <div class="rating">
                            @for($i=1 ; $i<5; $i++)
                                @if ($i<=round($product->first()->rates->avg('rating')))
                                    <i class="fa fa-star"></i>
                                @else
                                    <i class="fa fa-star-o"></i>
                                @endif
                            @endfor
                        </div>
                        <div class="item-title"><a href="">{{ $product->first()->name }}</a></div>
                        <div class="item-price">
                            <div class="price-box">
                                <p class="special-price"><span id="product-price-48" class="price">{{ money_format('%.2n', $product->first()->price_sale) }}</span></p>
                                <p class="old-price"><span class="price">{{ money_format('%.2n', $product->first()->price) }}</span> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach