@extends('client.layouts.master')

@section('content')
    <div class="content-page">
        <div class="container">
            <h2>Suggest new Product</h2>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $errors->first() }}</strong>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                </div>
            @endif
            <form action="{{ route('home.suggest.submit') }}" method="POST">
                @method('POST')
                @csrf
                <div class="content">
                    <ul class="form-list">
                        <li>
                            <label for="name">Name <span class="required">*</span></label>
                            <br>
                            <input class="input-text required-entry" type="text" id="name" name="name">
                        </li>
                        <li>
                            <label for="price">Price<span class="required">*</span></label>
                            <br>
                            <input class="input-text required-entry" id="price" name="price">
                        </li>
                        <li>
                            <label for="phone">Description</label>
                            <br>
                            <textarea rows="5" cols="20" id="description" name="description"></textarea>
                        </li>
                    </ul>
                    <br>
                    <button type="submit" class="button">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
