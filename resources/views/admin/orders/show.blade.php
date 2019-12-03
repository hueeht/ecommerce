@extends('admin.layouts.master')

@section('content')
    <div class='col-md-3'>
        <h2>{{ trans('admin.purchaser') }}</h2>
        <ul class="list-group">
            <li class="list-group-item">{{ trans('admin.name') }}: <strong>{{ $buyer->name }}</strong></li>
            <li class="list-group-item">{{ trans('admin.email') }}: <strong>{{ $buyer->email }}</strong></li>
            <li class="list-group-item">{{ trans('admin.addr') }}: <strong>{{ $buyer->address }}</strong></li>
            <li class="list-group-item">{{ trans('admin.phone') }}: <strong>{{ $buyer->phone }}</strong></li>
        </ul>
    </div>
    <div id="content-wrapper">
        @foreach($details as $detail)
            <div class="container col-md-6">
                <div class="">
                    <h2>{{ trans('admin.order') }}</h2>
                    <ul class="list-group">

                            <li class="list-group-item">{{ trans('admin.product') }}:
                                <strong>
                                    @foreach($products as $product)
                                        {{ $product->id==$detail->product_id?$product->name:'' }}
                                    @endforeach
                                </strong>
                            </li>
                            <li class="list-group-item">{{ trans('admin.quantity') }}: <strong>{{ $detail->quantity }}</strong></li>
                            <li class="list-group-item">{{ trans('admin.price') }}: <strong>{{ $detail->price }}</strong></li>

                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection
