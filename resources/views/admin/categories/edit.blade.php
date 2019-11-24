@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.categories.index') }}">{{ trans('admin.categories') }}</a>
            </li>
            <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <h2><i class="fas fa-tasks"></i>{{ trans('admin.edit_category') }}</h2>
                <div class="card-body">
                    <div>
                        <div class="col-sm-12 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                  <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i>  {{ $errors->first() }}</div>
                                                        @endif
                                                    <div class="form-group">
                                                        <label for="">{{ trans('admin.category_parent') }}:</label>
                                                        <select class="form-control" name="parent_id" id="">
                                                            <option value="0">---- {{ trans('admin.root') }} ----</option>
                                                            @include('admin.partials.categories_options', ['level' =>0])
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">{{ trans('admin.category_name') }}</label>
                                                        <input type="text" class="form-control" name="name" id=""
                                                            placeholder="Tên danh mục mới" value="{{ $category->name }}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">{{ trans('admin.submit') }}</button>
                                                </form>
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
<!-- /#wrapper -->
@endsection
