@extends('admin.layouts.master')

@section('content')
    <div id="content-wrapper">
        <div class="card mb-3">
            <div class="card-header">
                <h2><i class="fas fa-table"></i>{{ trans('admin.list_request') }}</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead class="thead-light">
                        <tr>
                            <th>{{ trans('admin.id') }}</th>
                            <th>{{ trans('admin.name') }}</th>
                            <th>{{ trans('admin.price') }}</th>
                            <th>{{ trans('admin.status') }}</th>
                            <th>{{ trans('admin.description') }}</th>
                            <th>{{ trans('admin.date') }}</th>
                            <th>{{ trans('admin.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($suggests as  $key=>$suggest)
                            <tr>
                                <th>{{ $key + 1 }} </th>
                                <th>{{ $suggest->name }}</th>
                                <th>{{ $suggest->price }}</th>
                                <th>
                                    @if ($suggest->status == "Waiting")
                                        <label class="btn-primary">{{ $suggest->status }}</label>
                                    @elseif ($suggest->status == "Approved")
                                        <label class="btn-success">{{ $suggest->status }}</label>
                                    @elseif ($suggest->status == "Denied")
                                        <label class="btn-danger">{{ $suggest->status }}</label>
                                    @endif
                                </th>
                                <th>{{ $suggest->description }}</th>
                                <th>{{ $suggest->created_at }}</th>
                                <th>
                                    <form action={{ route('admin.suggests.update', $suggest->id) }} method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" id="user" name="user" value={{ $suggest->user_id }}>
                                        <input type="hidden" id="name" name="name" value={{ $suggest->name }}>
                                        <input type="hidden" id="price" name="price" value={{ $suggest->price }}>
                                        <input type="hidden" id="description" name="description" value={{ $suggest->description }}>
                                        @if ($suggest->status == "Waiting")
                                            <button type="submit" class="btn btn-success" name="status" value="Approved">Approve</button>
                                            <button type="submit" class="btn btn-danger" name="status" value="Denied">Deny</button>
                                        @elseif($suggest->status == "Denied")
                                            <button type="submit" class="btn btn-success" name="status" value="Approved">Approve</button>
                                        @endif
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

@endsection
