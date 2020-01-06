@extends('admin.layouts.master')

@section('content')
    <div id="content-wrapper">
        <div class="card mb-3">
            <div class="card-header">
                <h2><i class="fas fa-table"></i>{{ trans('admin.list_order') }}</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead class="thead-light">
                        <tr>
                            <th>{{ trans('admin.id') }}</th>
                            <th>{{ trans('admin.total_quantity') }}</th>
                            <th>{{ trans('admin.total_price') }}</th>
                            <th>{{ trans('admin.status') }}</th>
                            <th>{{ trans('admin.date_buy') }}</th>
                            <th>{{ trans('admin.date_shipped') }}</th>
                            <th>{{ trans('admin.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as  $order)
                            <tr>
                                <th> {{ $order->id }} </th>
                                <th> {{ $order->total_quantity }}</th>
                                <th> {{ $order->total_price }}</th>
                                <th>
                                    @switch($order->status)
                                        @case(\App\Enums\OrderStatus::Waiting)
                                            <label class="btn-primary">{{ $order->status }}</label>
                                            @break
                                        @case(\App\Enums\OrderStatus::Shipping)
                                            <label class="btn-secondary">{{ $order->status }}</label>
                                            @break
                                        @case(\App\Enums\OrderStatus::Shipped)
                                            <label class="btn-success">{{ $order->status }}</label>
                                            @break
                                        @case(\App\Enums\OrderStatus::Canceled)
                                            <label class="btn-danger">{{ $order->status }}</label>
                                            @break
                                    @endswitch
                                </th>
                                <th> {{ $order->created_at }}</th>
                                <th>
                                    @if ($order->status == \App\Enums\OrderStatus::Shipped)
                                        {{ $order->updated_at }}
                                    @endif
                                </th>
                                <th>
                                    <a href={{ route('admin.orders.show',$order->id) }}>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    @if ($order->status == \App\Enums\OrderStatus::Canceled)
                                        <form action={{ route('admin.orders.destroy', $order->id) }} method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete" >
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endif
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
