@extends('client.layouts.master')

@section('content')
    <div class="content-page">
        <div class="container">
            <h2>My Profile</h2>
            <form action={{ route('profile.update', Auth::user()->id) }} method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-md-2">
                        <input id="name" name="name" value={{ Auth::user()->name }}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-md-2">
                        <input id="email" name="email" value={{ Auth::user()->email }}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="phone">Phone</label>
                    </div>
                    <div class="col-md-2">
                        <input id="phone" name="phone" value={{ Auth::user()->phone }}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="address">Address</label>
                    </div>
                    <div class="col-md-2">
                        <input id="address" name="address" value={{ Auth::user()->address }}>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@stop
