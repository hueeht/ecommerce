@extends('client.layouts.master')
@section('content')
    <div class="main-container col1-layout">
        <div class="main container">
            <div class="row">
                <section class="col-sm-12 col-xs-12">
                    <div class="col-main">
                        <div class="page-content checkout-page">
                            <div class="status-block">
                                <h3>
                                    <b class="title ">
                                        @lang('order.status'): {{ $order->status }} | {{ $order->updated_at->format('d - m - Y') }}
                                    </b>
                                </h3>
                            </div>
                            <div class="box-border">
                                <div class="order-detail-content">
                                    <table class="table table-bordered jtv-cart-summary">
                                        <thead>
                                        <tr>
                                            <th>@lang('product.name')</th>
                                            <th>@lang('cartp.price')</th>
                                            <th>@lang('cartp.qty')</th>
                                            <th>@lang('cartp.total')</th>
                                            @if ($order->status == "Shipped")
                                                <th>@lang('shop.act')</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($details as $detail)
                                            <tr id="product-cart">
                                                <td class="cart_description">
                                                    <p class="product-name">
                                                        <a href="{{ route('home.products.detail', $detail->product_id) }}">{{ $detail->product_name }}</a>
                                                    </p>
                                                </td>
                                                <td class="price"><span>{{ money_format('%.2n',$detail->price) }}</span></td>
                                                <td class="qty">{{ $detail->quantity }}</td>
                                                <td class="total-price" id="num-price-{{ $detail->total_price }}">
                                                    <span>{{ money_format('%.2n', $detail->num_price) }}</span>
                                                </td>
                                                @if ($order->status == "Shipped")
                                                    <td><a href="{{ route('home.rate.index', $detail->product_id) }}">@lang('rate.view')</a></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="3"><strong>@lang('cartp.total')</strong></td>
                                            <td colspan="2" id="total-price">
                                                <strong>{{ money_format('%.2n', $order->total_price) }}</strong>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div>
                                    @if ($order->status == "Waiting")
                                        <a href="{{ route('home.orders.cancel', $order->id) }}">
                                            <button class="btn btn-danger">@lang('order.cancel')</button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
