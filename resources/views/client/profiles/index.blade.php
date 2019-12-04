@extends('client.layouts.master')

@section('content')
    <div class="content-page">
        <div class="container">
            <h2>My Profile</h2>
            <div class="row">
                <a href={{ route('profile.edit') }} ><button class="btn btn-info btn-sm">{{ trans('admin.edit') }}</button></a>
            </div>
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
        </div>
    </div>
@stop
