@extends('client.layouts.master')

@section('content')
    <div class="content-page">
        <div class="container">
            <h2>My Profile</h2>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $errors->first() }}</strong>
                </div>
            @endif
            <form action={{ route('profile.update', Auth::user()->id) }} method="POST">
                @method('PUT')
                @csrf
                <div class="content">
                    <ul class="form-list">
                        <li>
                            <label for="name">Name <span class="required">*</span></label>
                            <br>
                            <input class="input-text required-entry" type="text" id="name" name="name" value={{ Auth::user()->name }}>
                        </li>
                        <li>
                            <label for="email">Email<span class="required">*</span></label>
                            <br>
                            <input class="input-text required-entry" id="email" name="email" value={{ Auth::user()->email }}>
                        </li>
                        <li>
                            <label for="phone">Phone</label>
                            <br>
                            <input class="input-text required-entry" id="phone" name="phone" value={{ Auth::user()->phone }}>
                        </li>
                        <li>
                            <label for="address">Address</label>
                            <br>
                            <input class="input-text required-entry" id="address" name="address" value={{ Auth::user()->address }}>
                        </li>
                    </ul>
                    <br>
                        <button type="submit" class="button btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@stop
