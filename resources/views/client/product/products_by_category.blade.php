@extends('client.layouts.master')
@section('content')
    <section class="main-container col2-right-layout">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-xs-12">
                    <article class="col-main">
                        @if ($category)
                            <h2 class="page-heading"><span class="page-heading-title">{{ $category->name }}</span></h2>
                            <div class="category-products">
                                <ol class="products-list" id="products-list">
                                    @foreach ($products as $product)
                                        <li class="item">
                                            <div class="product-image">
                                                <a href="{{ route('home.products.detail',['id' => $product->id ]) }}"><img class="img-responsive" src="{{ asset('storage/images/products/'.$product->images->first()->getAttribute('image')) }}" alt="{{ $product->name }}"></a>
                                            </div>
                                            <div class="product-shop">
                                                <h2 class="product-name"><a href="#">{{ $product->name }}</a></h2>
                                                <div class="desc std">
                                                    <p>{{ $product->description }}<a class="link-learn" href="{{ route('home.products.detail',['id' => $product->id ]) }}">@lang('category.learn')</a></p>
                                                </div>
                                                <div class="price-box">
                                                    <p class="old-price"><span class="price-label"></span><span class="price">{{ money_format('%.2n', $product->price) }}</span></p>
                                                    <p class="special-price"><span class="price-label"></span><span class="price">{{ money_format('%.2n', $product->price_sale) }}</span></p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        @else
                            <h2 class="page-heading"><span class="page-heading-title">@lang('category.404')</span></h2>
                        @endif
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
