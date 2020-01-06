@extends('admin.layouts.master')

@section('content')
    <div id="content-wrapper">
        <div class="container col-md-6">
            <form action={{ route('admin.users.update', $user->id) }} method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">{{ trans('admin.name') }}:</label>
                        <input type="text" class="form-control" id="name" name="name" value={{ $user->name }}>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ trans('admin.email') }}:</label>
                        <input type="text" class="form-control" id="email" name="email" value={{ $user->email }}>
                    </div>
                    <div class="form-group">
                        <label for="address">{{ trans('admin.addr') }}:</label>
                        <input type="text" class="form-control" id="address" name="address" value={{ $user->address }}>
                    </div>
                    <div class="form-group">
                        <label for="phone">{{ trans('admin.phone') }}:</label>
                        <input type="text" class="form-control" id="phone" name="phone"  value={{ $user->phone }}  >
                    </div>
                    <div class="form-group">
                        <label for="role_id">{{ trans('admin.role') }}:
                            <select name="role_id" class="custom-select m-md-3">
                                @foreach($roles as $role)
                                    <option value={{ $role->id }} {{ $role->id===$user->role_id?'selected':'' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary" >{{ trans('admin.submit') }}</button>
            </form>
        </div>
    </div>
@endsection
