@extends('admin.layouts.master')

@section('content')
<!-- Icon Cards-->
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">{{ trans('admin.dashboard') }}</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5">Messages!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="https://app.subiz.com/convo">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-bell"></i>
                        </div>
                        <div class="mr-5">{{ $suggest.' '.trans('admin.new_request') }}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href={{ route('admin.suggests.index') }}>
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">{{ $order.' '.trans('admin.new_order') }}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href={{ route('admin.orders.index') }}>
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-star"></i>
                        </div>
                        <div class="mr-5">{{ $rate.' '.trans('admin.rate_new') }}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href={{ route('admin.rates.index') }}>
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row py-4">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <input type="hidden" id="months" value={{ json_encode($months) }} >
                    <input type="hidden" id="revenues" value={{ json_encode($revenues) }} >
                    <input type="hidden" id="years" value={{ json_encode($yearArr) }} >
                    <div class="card-header">
                        <div>
                            <i class="fas fa-chart-bar"></i>
                            {{ trans('admin.revenue') }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="btn-group">
                            @foreach($years as $year)
                                <button type="button" id="year{{ $year->year }}" class="btn btn-primary">{{ $year->year }}</button>
                            @endforeach
                        </div>
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-3">
                    <input type="hidden" id="product" value={{ json_encode($product) }}>
                    <input type="hidden" id="num" value={{ json_encode($num) }}>
                    <div class="card-header">
                        <i class="fas fa-chart-pie"></i>
                        {{ trans('admin.top5_order') }}</div>
                    <div class="card-body">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <div>
                    <i class="fas fa-chart-bar"></i>
                    Order in Year
                </div>
            </div>
            <div class="card-body">
                <input type="hidden" id="orderYear" value={{ json_encode($orderYear) }}>
                <div class="btn-group">
                    @foreach($years as $year)
                        <button type="button" id="yearorder{{ $year->year }}" class="btn btn-primary">{{ $year->year }}</button>
                    @endforeach
                </div>
                <canvas id="myLineChart" width="400" height="150"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        var ctx = document.getElementById('myLineChart').getContext('2d');
        var data = JSON.parse($("#orderYear").val());
        var years = JSON.parse($("#years").val());
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
                datasets: [{
                    label: 'orders',
                    data: data['2020'],
                    backgroundColor: [
                        '#ff4d4d',
                        '#ff6600',
                        '#ff6666',
                        '#ff6699',
                        '#ff99cc',
                        '#ff99ff',
                        '#cc66ff',
                        '#9999ff',
                        '#80bfff',
                        '#6699ff',
                        '#3366ff',
                        '#000099',
                        '#002b80',
                    ],
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        years.forEach(function (value) {
            $("#yearorder" + value).click(function () {
                myLineChart.data.datasets[0].data = data[value];
                myLineChart.update();
            });
        });
    </script>
@endpush

