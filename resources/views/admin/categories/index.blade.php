@extends('admin.layouts.master')
@section('content')
<!-- content -->
<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.categories.index') }}">{{ trans('setting.categories') }}</a>
            </li>
            <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <h2><i class="fas fa-tasks"></i>{{ trans('admin.list_categories') }}</h2>
                <div class="card-body">
                    <div>
                        <div class="col-sm-12 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <a href="{{ route('admin.categories.create') }}">
                                                        <button class="btn btn-primary">
                                                            <i class="fa fa-plus-square"></i> {{ trans('admin.add_category') }}
                                                        </button>
                                                    </a>
                                                    @if (session('alert'))
                                                    <hr>
                                                        <div class="alert alert-success">{{ session('alert') }}</div>
                                                    @endif
                                                    <hr>
                                                    <div class="vertical-menu">
                                                        @include('admin.partials.categories_rows', ['level' => 0])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
