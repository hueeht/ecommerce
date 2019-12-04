@extends('admin.layouts.master')

@section('content')
    <div id="content-wrapper">
        <section class="content-header">
            <h1>{{ trans('admin.order_detail') }}</h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container123  col-md-6"   style="">
                                <h4></h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="col-md-4">{{ trans('admin.customer_info') }}</th>
                                        <th class="col-md-6"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ trans('admin.name') }}</td>
                                        <td>{{ $buyer->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('admin.phone') }}</td>
                                        <td>{{ $buyer->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('admin.addr') }}</td>
                                        <td>{{ $buyer->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('admin.email') }}</td>
                                        <td>{{ $buyer->email }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th>{{ trans('admin.stt') }}</th>
                                    <th>{{ trans('admin.name') }}</th>
                                    <th>{{ trans('admin.quantity') }}</th>
                                    <th>{{ trans('admin.price') }}</th>
                                </thead>
                                <tbody>
                                @foreach($details as $key => $detail)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            @foreach($products as $product)
                                                {{ $product->id==$detail->product_id?$product->name:"" }}
                                            @endforeach
                                        </td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ $detail->price }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"><b>{{ trans('admin.total_price') }}</b></td>
                                    <td colspan="1"><b class="text-red"></b>{{ $order->total_price }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            <div class="col-md-12">
                <form action={{ route('admin.orders.update', $order->id) }} method="POST">
                    @method('PUT')
                    @csrf
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="form-inline">
                            <label>{{ trans('admin.status') }} :
                                <select name="status" class="form-control input-inline">
                                    <option value={{ trans('admin.waiting') }}>{{ trans('admin.waiting') }}</option>
                                    <option value={{ trans('admin.shipping') }}>{{ trans('admin.shipping') }}</option>
                                    <option value={{ trans('admin.shipped') }}>{{ trans('admin.shipped') }}</option>
                                </select>
                            </label>
                            <input class="btn btn-primary" type="submit" value={{ trans('admin.done') }} >
                        </div>
                    </div>
                </form>
            </div>
                </div>
            </div>
        </section>
    </div>
@endsection
