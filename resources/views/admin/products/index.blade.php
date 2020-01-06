@extends('admin.layouts.master')

@section('content')
<div id="content-wrapper">
    <div class="card mb-3">
        <div class="card-header">
            <h2><i class="fas fa-table"></i>{{ trans('admin.list_prd') }}</h2>
        </div>
        <a href={{ route('admin.products.create') }}>
            <button class="btn btn-primary">
                <i class="fa fa-plus-square"></i> {{ trans('admin.add_prd') }}
            </button>
        </a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" >
                    <thead class="thead-light">
                    <tr>
                        <th>{{ trans('admin.id') }}</th>
                        <th>{{ trans('admin.name') }}</th>
                        <th>{{ trans('admin.price') }}</th>
                        <th>{{ trans('admin.price_sale') }}</th>
                        <th>{{ trans('admin.description') }}</th>
                        <th>{{ trans('admin.image') }}</th>
                        <th>{{ trans('admin.quantity') }}</th>
                        <th>{{ trans('admin.memory') }}</th>
                        <th>{{ trans('admin.trademark') }}</th>
                        <th>{{ trans('admin.category') }}</th>
                        <th>{{ trans('admin.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as  $product)
                    <tr>
                        <th> {{ $product->id }} </th>
                        <th> {{ $product->name }}</th>
                        <th> {{ $product->price }}</th>
                        <th> {{ $product->price_sale }}</th>
                        <th> {{ $product->description }}</th>
                        <th>
                            @foreach($images as $image)
                                @if ($image->product_id == $product->id)
                                    <img width="200px" height="200px" src={{ asset('storage/images/products/' . $image->image) }} >
                                @endif
                            @endforeach
                        </th>
                        <th> {{ $product->quantity }}</th>
                        <th> {{ $product->memory }}</th>
                        <th> {{ $product->trademark }}</th>
                        <th> {{ $product->category }}</th>
                        <th>
                            <a href={{ route('admin.products.edit',$product->id) }}>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                            <form action={{ route('admin.products.destroy', $product->id) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete" >
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
