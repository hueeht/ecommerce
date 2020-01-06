@extends('client.layouts.master')

@section('content')
    <div class="content-page">
        <div class="container">
            @if (session()->has('edited'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session()->get('edited') }}</strong>
                </div>
            @endif
            <h2>My Profile</h2>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <label>Name</label>
                </div>
                <div class="col-md-2">
                    <p class="profile-name">{{ Auth::user()->name }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Email</label>
                </div>
                <div class="col-md-2">
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Phone</label>
                </div>
                <div class="col-md-2">
                    <p>{{ Auth::user()->phone }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Address</label>
                </div>
                <div class="col-md-2">
                    <p>{{ Auth::user()->address }}</p>
                </div>
            </div>
            <a href={{ route('profile.edit') }} ><button class="button btn-info btn-sm">@lang('user.change')</button></a>
        </div>
    </div>
@stop
