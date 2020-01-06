@extends('admin.layouts.master')

@section('content')
    <div id="content-wrapper">
        <div class="card mb-3">
            <div class="card-header">
                <h2><i class="fas fa-table"></i>{{ trans('admin.list_request') }}</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                        <tr>
                            <th>{{ trans('admin.id') }}</th>
                            <th>{{ trans('admin.name') }}</th>
                            <th>{{ trans('admin.rate') }}</th>
                            <th>{{ trans('admin.status') }}</th>
                            <th>{{ trans('admin.date') }}</th>
                            <th>{{ trans('admin.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rates as  $key=>$rate)
                            <tr>
                                <th>{{ $key+1 }} </th>
                                <th>
                                    @foreach($users as $user)
                                        {{ $user->id==$rate->user_id?$user->name:'' }}
                                    @endforeach
                                </th>
                                <th>{{ $rate->price }}</th>
                                <th>
                                    @if ($rate->status == "Pending")
                                        <label class="btn-primary">{{ $rate->status }}</label>
                                    @elseif ($rate->status == "Approved")
                                        <label class="btn-success">{{ $rate->status }}</label>
                                    @elseif ($rate->status == "Denied")
                                        <label class="btn-danger">{{ $rate->status }}</label>
                                    @endif
                                </th>
                                <th>{{ $rate->created_at }}</th>
                                <th>
                                    <form action={{ route('admin.rates.update', $rate->id) }} method="POST">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-success" name="status" value="Approved">Approve</button>
                                        <button type="submit" class="btn btn-danger" name="status" value="Denied">Deny</button>
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
