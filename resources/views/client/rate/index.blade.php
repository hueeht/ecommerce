@extends('client.layouts.master')
@section('content')
    <!-- Main Container -->
    <section class="main-container col1-layout">
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-main">
                        <div class="product-view">
                            <div class="product-essential">
                                <div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
                                    <div class="new-label new-top-left"></div>
                                    <div class="product-image">
                                        <div class="product-full">
                                            <img class="img-responsive" id="product-zoom" src="{{ asset('storage/images/products/'.$product->images->first()->getAttribute('image')) }}" data-zoom-image="{{ asset('storage/images/products/'.$product->images->first()->getAttribute('image')) }}" width="400">
                                        </div>
                                    </div>
                                    <!-- more-images -->
                                </div>
                                <div class="product-shop col-lg-7 col-sm-7 col-xs-12">
                                    <div class="product-name">
                                        <h1 class="product-detail-name m-text16 p-b-13" data-value="{{ $product->name }}">
                                            {{ $product->name }}
                                        </h1>
                                    </div>
                                    <div class="price-block">
                                        <div class="price-box">
                                            <p class="special-price"><span id="product-price-48" class="price">${{ number_format($product->price_sale) }}</span></p>
                                            <p class="old-price"><span class="price">${{ number_format($product->price) }}</span> </p>
                                        </div>
                                    </div>
                                    <div class="info-orther">
                                        <p>@lang('product.status'): <span class=" label label-{{ $product->quantity>0?'success':'danger' }}">{{ $product->quantity>0?__(trans('product.ins')): __(trans('product.outs')) }}</span></p>
                                    </div>
                                    <div class="short-description">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div class="form-option">
                                        <p class="form-option-title">@lang('product.mem'): {{ $product->memory->name }}</p>
                                        <p class="form-option-title">@lang('product.trade'): {{ $product->trademark->name }}</p>
                                    </div>
                                    <form action="{{ route('home.rate.submit', $product->id) }}" method="POST">
                                        @method('POST')
                                        @csrf
                                        <div class="form-option-title">
                                            <b>@lang('rate.tit'): </b>
                                                <select id="backing3c" name="rateOption">
                                                    <option value="1">Bad</option>
                                                    <option value="2">OK</option>
                                                    <option value="3">Great</option>
                                                    <option value="4">Excellent</option>
                                                </select>
                                                <div class="rateit" data-rateit-backingfld="#backing3c" data-rateit-min="0"></div>
                                        </div>
                                        <div class="comment-content">
                                            <b>@lang('product.cmt')</b>
                                            <div id="productTabContent" class="tab-content">
                                                <div class="fb-comments" data-href="http://127.0.0.1:8000/products/{{ $product->id }}" data-width="" data-numposts="5"></div>
                                            </div>
                                        </div>
                                        <button class="button btn-cart" type="submit">
                                            @lang('shop.sub')
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
