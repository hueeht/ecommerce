<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href={{ asset('bower_components/admin_template/vendor/fontawesome-free/css/all.min.css') }} rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href={{ asset('bower_components/admin_template/bootstrap/dist/css/bootstrap.css') }} rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href={{ asset('bower_components/admin_template/css/sb-admin.css') }} rel="stylesheet">

    <link href={{ asset('bower_components/jstree/dist/themes/default/style.css') }} rel="stylesheet" type="text/css">

</head>


<body id="page-top">
    @include('admin.layouts.header')
    <div id="wrapper">
        @include('admin.layouts.sidebar')
        @yield('content')
        @include('admin.layouts.footer')
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- JavaScript-->
    <!-- Bootstrap core JavaScript-->
    <script src={{ asset('bower_components/admin_template/jquery/dist/jquery.slim.min.js') }}></script>
    <script src={{ asset('bower_components/admin_template/popper.js/dist/umd/popper.min.js') }} ></script>
    <script src={{ asset('bower_components/admin_template/bootstrap/dist/js/bootstrap.min.js') }} ></script>
    <script src={{ asset('bower_components/admin_template/jquery/dist/jquery.min.js') }}></script>
    <script src={{ asset('bower_components/admin_template/bootstrap/dist/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('js/app.js') }}></script>
    <script src={{ asset('bower_components/admin_template/chart.js/dist/Chart.js') }}></script>
    <script>
        var ctx1 = document.getElementById("myBarChart");
        var months = JSON.parse($("#months").val());
        var revenues = JSON.parse($("#revenues").val());
        var years = JSON.parse($("#years").val());
        var myBarChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: months[0],
                datasets: [{
                    label: "Revenue",
                    backgroundColor: "rgba(2,117,216,1)",
                    borderColor: "rgba(2,117,216,1)",
                    data: revenues[0],
                }],
            },
            option: {
                scales: {
                    yAxes:
                        {
                            ticks: {
                                maxTicksLimit: 4,
                                max: 8000,
                            }
                        }
                }
            }
        });
        years.forEach(function (value, key) {
            $("#year" + value).click(function () {
                myBarChart.data.labels = months[key];
                myBarChart.data.datasets[0].data = revenues[key];
                myBarChart.update();
            });
        });
    </script>
    <script>
        var ctx2 = document.getElementById("myPieChart");
        var products = {!! json_encode($product) !!}
        var nums = JSON.parse($("#num").val());
        var myPieChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: products,
                datasets: [{
                    data: nums,
                    backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#aa80ff'],
                }],
            },
        });
    </script>
    <script>
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;
                    for (var i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview).width(150)
                                .height(200);
                        };
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });
    </script>
    <script src={{ asset('bower_components/admin_template/pusher-js/dist/web/pusher.min.js') }}></script>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: 'ap1',
            encrypted: true
        });

        var notifyCount = parseInt($('.notify-count-icon').text());
        var channel = pusher.subscribe('SendOrderInfo');
        var image = "{{ asset('storage/images/icon-system.png') }}";
        channel.bind('send-info', function(data) {
            notifyCount+=1;
            $(".notify-count-icon").html(notifyCount);
            $(".notify-count-dropdown").html("Notifications (" + notifyCount + ")");
            var link = "http://127.0.0.1:8000/admin/notifications/" + data.id;
            $("#notify-message").append("<li class='notification-box'>\n" +
                "                                <div class='row'>\n" +
                "                                    <div class=\"col-lg-3 col-sm-3 col-3 text-center\">\n" +
                "                                        <img src='"+ image +"' class='w-50 rounded-circle'>\n" +
                "                                    </div>\n" +
                "                                    <div class=\"col-lg-8 col-sm-8 col-8\">\n" +
                "                                        <strong class='text-info'>" + data.user_name + "</strong>\n" +
                "                                        <div>\n" +
                "                                            Already ordered\n" +
                "                                            <span class='float-right'><a href= '" + link + "'>" + "<i class='fas fa-eye'></i></a></span>" +
                "                                        </div>\n" +
                "                                        <small class='text-warning'>" + data.created_at + "</small>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </li>");
        });
    </script>
    @stack('js')
</body>

</html>
