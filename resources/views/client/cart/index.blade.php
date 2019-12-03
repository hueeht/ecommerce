@extends('client.layouts.master')
@section('content')
    <div class="main container">
        <div class="shopping-cart-inner">
            <div class="page-content">
                @if($carts)
                <div class="heading-counter warning">@lang('cartp.contain')<span> {{ $carts_qty }} @lang('product.tit')</span> </div>
                <div class=" table-responsive">
                    <div class="order-detail-content">
                        <table class="table table-bordered jtv-cart-summary">
                            <thead>
                            <tr>
                                <th class="cart_product">Product</th>
                                <th>@lang('product.name')</th>
                                <th>@lang('cartp.price')</th>
                                <th>@lang('cartp.qty')</th>
                                <th>@lang('cartp.total')</th>
                                <th class="action"><i class="fa fa-trash-o"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                    <tr>
                                        <td class="cart_product"><a href="#"><img class="img-responsive" src="{{ asset('storage/images/products/img01.jpg') }}"></a></td>
                                        <td class="cart_description"><p class="product-name"><a href="#">{{ $cart['product_name'] }}</a></p>
                                        <td class="price"><span>{{ $cart['product_price'] }}</span></td>
                                        <td class="qty"><input class="form-control input-sm" type="text" value="1">
                                            <a href="#"><i class="fa fa-plus"></i></a> <a href="#"><i class="fa fa-minus"></i></a></td>
                                        <td class="total-price"><span>100000</span></td>
                                        <td class="action"><a href="#">Delete item</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td colspan="2"><strong>$355.00</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="cart_navigation">
                            <button class="button continue-shopping" title="Continue shopping" type="button"><span>Continue shopping</span></button>
                            <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>Proceed to Checkout</span></button>
                        </div>
                        @else
                            <div class="heading-counter warning">Your shopping cart is empty</div>
                            <div class="cart_navigation">
                                <button class="button continue-shopping" title="Continue shopping" type="button"><span>Continue shopping</span></button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
