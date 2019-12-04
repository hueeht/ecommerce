@extends('admin.layouts.master')

@section('content')
    <div id="content-wrapper">
        <div class="card mb-3">
            <div class="card-header">
                <h2><i class="fas fa-table"></i>{{ trans('admin.list_order') }}</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                        <tr>
                            <th>{{ trans('admin.id') }}</th>
                            <th>{{ trans('admin.total_quantity') }}</th>
                            <th>{{ trans('admin.total_price') }}</th>
                            <th>{{ trans('admin.status') }}</th>
                            <th>{{ trans('admin.date_order') }}</th>
                            <th>{{ trans('admin.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as  $order)
                            <tr>
                                <th> {{ $order->id }} </th>
                                <th> {{ $order->total_quantity }}</th>
                                <th> {{ $order->total_price }}</th>
                                <th> {{ $order->status }}</th>
                                <th> {{ $order->created_at }}</th>
                                <th>
                                    <a href={{ route('admin.orders.show',$order->id) }}>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <form action={{ route('admin.orders.destroy', $order->id) }} method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" id="delete">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </form>
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
