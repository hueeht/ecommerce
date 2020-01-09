@extends('client.layouts.master')
@section('content')
    <div class="main container">
        <div class="shopping-cart-inner">
            <div class="page-content">
                @if($orders)
                    <div class="order-detail-content">
                        <table class="table table-bordered jtv-cart-summary">
                            <thead>
                            <tr>
                                <th>@lang('order.id')</th>
                                <th>@lang('order.buyday')</th>
                                <th>@lang('order.product')</th>
                                <th>@lang('order.totalprice')</th>
                                <th>@lang('order.status')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td ><a href="{{ route('home.orders.detail', $order->id) }}">{{ $order->id }}</a></td>
                                    <td >{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td >
                                        @php
                                        $count = count($order['detail']);
                                        foreach ($order->detail as $detail)
                                        {
                                            echo $detail->product_name;
                                            if (--$count)
                                            {
                                                echo ", ";
                                            }
                                        }
                                        @endphp
                                    </td>
                                    <td class="price">
                                        <span>{{ money_format('%.2n', $order->total_price) }}</span>
                                    </td>
                                    <td >{{ $order->status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    @lang('order.empty')
                @endif
            </div>
        </div>
    </div>
@endsection
