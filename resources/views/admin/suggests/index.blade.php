@extends('admin.layouts.master')

@section('content')
    <div id="content-wrapper">
        <div class="card mb-3">
            <div class="card-header">
                <h2><i class="fas fa-table"></i>{{ trans('admin.list_request') }}</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                <th>{{ $key+1 }} </th>
                                <th>{{ $suggest->name }}</th>
                                <th>{{ $suggest->price }}</th>
                                <th id="th-status">
                                    @if ($suggest->status == "Waiting")
                                        <label class="btn-primary">{{ $suggest->status }}</label>
                                    @elseif ($suggest->status == "Approve")
                                        <label class="btn-success">{{ $suggest->status }}</label>
                                    @elseif ($suggest->status == "Deny")
                                        <label class="btn-danger">{{ $suggest->status }}</label>
                                    @endif
                                </th>
                                <th>{{ $suggest->description }}</th>
                                <th>{{ $suggest->created_at }}</th>
                                <th>
                                    <input type="hidden" id="suggest-id" value="{{ $suggest->id }}">
                                    <button  class="btn btn-success" id="btnApprove"  value="Approve">Approve</button>
                                    <button  class="btn btn-danger" id="btnDeny"  value="Deny">Deny</button>
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
