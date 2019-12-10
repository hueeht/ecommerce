@extends('client.layouts.master')
@section('content')
    <div class="main-container col1-layout">
        <div class="main container">
            <div class="row">
                <section class="col-sm-12 col-xs-12">
                    <div class="col-main">
                        <div class="page-content checkout-page">
                            <div class="heading-counter warning">@lang('cartp.contain')<span id="cart-contain"> {{ $carts_qty }}</span> @lang('product.tit')</div>
                            <div class="box-border">
                                <div class="order-detail-content">
                                    <table class="table table-bordered jtv-cart-summary">
                                        <thead>
                                        <tr>
                                            <th class="cart_product">@lang('product.tit')</th>
                                            <th>@lang('product.name')</th>
                                            <th>@lang('cartp.price')</th>
                                            <th>@lang('cartp.qty')</th>
                                            <th>@lang('cartp.total')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($carts as $cart)
                                            <tr id="product-cart">
                                                <td class="cart_product"><a href="#"><img class="img-responsive" src="{{ asset('storage/images/products/'.$cart['product_image']) }}"></a></td>
                                                <td class="cart_description"><p class="product-name"><a href="#">{{ $cart['product_name'] }}</a></p></td>
                                                <td class="price"><span>{{ number_format($cart['product_price']) }}</span></td>
                                                <td class="qty">{{ $cart['product_num'] }}</td>
                                                <td class="total-price" id="num-price-{{ $cart['product_id'] }}"><span>{{ number_format($cart['num_price']) }}</span></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="3"><strong>Total</strong></td>
                                            <td colspan="2" id="total-price"><strong>{{ number_format($total_price) }}</strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="cart_navigation">
                                        <a href="{{ route('home.carts.submit') }}"><button class="button pull-right" id="place-order">Place Order</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
