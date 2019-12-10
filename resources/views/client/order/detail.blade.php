@extends('client.layouts.master')
@section('content')
    <div class="main-container col1-layout">
        <div class="main container">
            <div class="row">
                <section class="col-sm-12 col-xs-12">
                    <div class="col-main">
                        <div class="page-content checkout-page">
                            <div class="heading-counter warning">@lang('user.info')</div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-2">
                                    <p class="profile-name">{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-2">
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-2">
                                    <p>{{ Auth::user()->phone }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-2">
                                    <p>{{ Auth::user()->address }}</p>
                                </div>
                            </div>
                            <div class="styles__StyledOrderStatus-ckobss-1 cxNMzk">
                                <div class="status-block">
                                    <b class="title">Trạng thái đơn hàng: <b>{{ $order->status }} | {{ $order->updated_at->format('d - m - Y') }}</b>
                                    <div class="progress-bar">
                                        <div class="styles__ProgressStep-ckobss-5 jZYIXL">
                                            <span>Đặt hàng thành công</span>
                                        </div>
                                        <div class="styles__ProgressStep-ckobss-5 jZYIXL">
                                            <span>Tiki đã tiếp nhận</span>
                                        </div>
                                        <div class="styles__ProgressStep-ckobss-5 jZYIXL">
                                            <span>Đang lấy hàng</span>
                                        </div>
                                        <div class="styles__ProgressStep-ckobss-5 jZYIXL">
                                            <span>Đóng gói xong</span>
                                        </div>
                                        <div class="styles__ProgressStep-ckobss-5 jZYIXL">
                                            <span>Bàn giao vận chuyển</span>
                                        </div>
                                        <div class="styles__ProgressStep-ckobss-5 jZYIXL">
                                            <span>Đang vận chuyển</span>
                                        </div>
                                        <div class="styles__ProgressStep-ckobss-5 eIBpVX">
                                            <span>Giao hàng thành công</span>
                                        </div>
                                    </div>
                                </div>
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
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($details as $detail)
                                            <tr id="product-cart">
                                                <td class="cart_description"><p class="product-name"><a href="{{ route('home.products.detail', $detail->product_id) }}">{{ $detail->product_name }}</a></p></td>
                                                <td class="price"><span>{{ number_format($detail->price) }}</span></td>
                                                <td class="qty">{{ $detail->quantity }}</td>
                                                <td class="total-price" id="num-price-{{ $detail->total_price }}"><span>{{ number_format( $detail->num_price) }}</span></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="3"><strong>Total</strong></td>
                                            <td colspan="2" id="total-price"><strong>{{ number_format($order->total_price) }}</strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div>
                                    <a href="{{ route('home.orders.cancel', $order->id) }}"><button class="button">Cancel Order</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
