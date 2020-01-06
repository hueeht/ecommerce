@extends('admin.layouts.master')

@section('content')
    <div id="content-wrapper">
        <div class="card mb-3">
            <div class="card-header">
                <h2><i class="fas fa-table"></i>{{ trans('admin.list_user') }}</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                        <tr>
                            <th>{{ trans('admin.id') }}</th>
                            <th>{{ trans('admin.name') }}</th>
                            <th>{{ trans('admin.email') }}</th>
                            <th>{{ trans('admin.addr') }}</th>
                            <th>{{ trans('admin.phone') }}</th>
                            <th>{{ trans('admin.role') }}</th>
                            <th>{{ trans('admin.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as  $user)
                            <tr>
                                <th> {{ $user->id }} </th>
                                <th> {{ $user->name }}</th>
                                <th> {{ $user->email }}</th>
                                <th> {{ $user->address }}</th>
                                <th> {{ $user->phone }}</th>
                                <th>
                                    @if ($user->role_id == 1)
                                        {{ trans('admin.admin') }}
                                    @elseif($user->role_id == 2)
                                        {{ trans('admin.client') }}
                                    @endif
                                </th>
                                <th>
                                    <a href={{ route('admin.users.edit',$user->id) }}>
                                        <button type="submit" class="btn btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    <form action={{ route('admin.users.destroy', $user->id) }} method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete">
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
