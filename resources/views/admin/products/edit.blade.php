@extends('admin.layouts.master')

@section('content')
    <div id="content-wrapper">
        <div class="container col-md-6">
            <form action={{ route('admin.products.update',$product->id) }} method="POST" >
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">{{ trans('admin.name') }}:</label>
                    <input type="text" class="form-control" id="name" name="name" value={{ $product->name }}>
                </div>
                <div class="form-group">
                    <label for="price">'{{ trans('admin.price') }}:</label>
                    <input type="number" class="form-control" id="price" name="price" value={{ $product->price }}
                    @error('price')
                        <div class="has-feedback text-danger">{{ $message }}</div>
                    @enderror
                <div class="form-group">
                    <label for="price_sale">{{ trans('admin.price_sale') }}:</label>
                    <input type="number" class="form-control" id="price_sale" name="price_sale" value={{ $product->price_sale }}>
                    @error('price_sale')
                    <div class="has-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">{{ trans('admin.description') }}:</label>
                    <textarea type="text" class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                    @error('description')
                    <div class="has-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">{{ trans('admin.image') }}:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="quantity">{{ trans('admin.quantity') }}:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value={{ $product->quantity }}>
                    @error('quantity')
                    <div class="has-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="memory">{{ trans('admin.memory') }}:
                        <select name="memory_id" class="custom-select m-md-3">
                            @foreach($memories as $memory)
                                <option value={{ $memory->id }} {{ $memory->id===$product->memory_id?'selected':'' }}>{{ $memory->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="form-group">
                    <label for="category">{{ trans('admin.category') }}:
                        <select name="category_id" class="custom-select m-md-3">
                            @include('admin.products.category_options', ['level' =>0])
                        </select>
                    </label>
                </div>
                <div class="form-group">
                    <label for="trademark">{{ trans('admin.trademark') }}:
                        <select name="trademark_id" class="custom-select m-md-3">
                            @foreach($trademarks as $trademark)
                                <option value={{ $trademark->id }} {{ $trademark->id===$product->trademark_id?'selected':'' }}>{{ $trademark->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">{{ trans('admin.submit') }}</button>
            </form>
        </div>
    </div>
@endsection
