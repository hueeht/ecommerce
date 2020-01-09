<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>

    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@lang('shop.title')</title>

    <meta name="google" content="clean template, electronics Store, html5, electronics template, makeup store, modern, multipurpose store, electronics shop, commerce, ecommerce, electronics, electronics theme, megamenu, modern, retail, store"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/images/favicon.ico')}}">

    <link rel="stylesheet" href="{{ asset('bower_components/client_bower/bootstrap/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('bower_components/client_bower/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('bower_components/client_bower/simple-line-icons/css/simple-line-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('bower_components/client_bower/pixeden-stroke-7-icon/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css') }}">

    <link rel="stylesheet" href="{{asset('bower_components/client_bower/owl.carousel/dist/assets/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('bower_components/client_bower/jtv-menu/jtv-mobile-menu.css')}}">

    <link rel="stylesheet" href="{{asset('bower_components/client_bower/slider-rev/revolution-slider.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-sweetalert/dist/sweetalert.css') }}">

    <link rel="stylesheet" href="{{ asset('bower_components/jquery.rateit/scripts/rateit.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap-notifications/dist/stylesheets/bootstrap-notifications.css') }}">

</head>

<body class="cms-index-index cms-home-page">

    @include('client.layouts.header')

    @yield('content')

    @include('client.layouts.footer')

    <div id="fb-root"></div>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=115063339046071&autoLogAppEvents=1"></script>

    <script src="{{asset('bower_components/client_bower/jquery/dist/jquery.min.js')}}"></script>

    <script src="{{asset('bower_components/client_bower/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('bower_components/client_bower/owl.carousel/dist/owl.carousel.min.js')}}"></script>

    <script src="{{asset('bower_components/client_bower/jtv-menu/jtv-mobile-menu.js')}}"></script>

    <script src="{{asset('bower_components/client_bower/countdown/dest/countdown.js')}}"></script>

    <script src="{{asset('bower_components/client_bower/slider-rev/rev-slider.js')}}"></script>

    <script src="{{asset('js/app.js')}}"></script>

    <script src="{{asset('js/subiz.js')}}"></script>

    <script src="{{ asset('bower_components/bootstrap-sweetalert/dist/sweetalert.min.js') }}"></script>

    <script src="{{ asset('bower_components/bootstrap-sweetalert/dist/sweetalert.js') }}"></script>

    <script src="{{ asset('bower_components/jquery.rateit/scripts/jquery.rateit.min.js') }}"></script>

    <script src="{{ asset('bower_components/jquery.rateit/scripts/jquery.rateit.js') }}"></script>

    <script src="{{ asset('bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.js') }}"></script>

    <script src="{{ asset('bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') }}"></script>

    @stack('js')

    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>

    <script>

        Pusher.logToConsole = true;

        var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: 'ap1',
            encrypted: true
        });

        var notificationsWrapper   = $('.dropdown-notify');
        var notificationsToggle    = notificationsWrapper.find('span[data-toggle]');
        var notificationsCountElem = notificationsToggle.find('i[data-count]');
        var notificationsCount     = parseInt(notificationsCountElem.data('count'));
        var notifications          = notificationsWrapper.find('ul.notification-content');
        var channel = pusher.subscribe('SendStatus');
        var image = "{{ asset('storage/images/icon-order.png') }}";
        channel.bind('send-status', function(data) {
            var route = "http://127.0.0.1:8000/mark/"+data.id;
            var existingNotifications = notifications.html();
            var newNotificationHtml = `
                 <li class="item odd">
                    <a href="" class="product-image"><img src="`+image+`" width="65"></a>
                    <div class="product-details">
                        <a href="`+ route +`"><strong class="notification-title"> Your order [`+data.id+`] is `+data.status+` </strong></a><br>
                    </div>
                 </li>`;
            notifications.html(newNotificationHtml + existingNotifications);
            notificationsCount += 1;
            notificationsCountElem.attr('data-count', notificationsCount);
            notificationsWrapper.find('.notif-count').text(notificationsCount);
            notificationsWrapper.show();
            var status = data.status;
            if(status === 'Shipping') {
                $.notify({
                    title: '<strong></strong>',
                    message: 'Your order ['+ data.id +'] is Shipping'
                },{
                    type: 'warning'
                });
            }
            if(status === 'Shipped') {
                $.notify({
                    title: '<strong></strong>',
                    message: 'Your order ['+ data.id +'] is Shipped'
                },{
                    type: 'success'
                });
            }
            if(status === 'Canceled') {
                $.notify({
                    title: '<strong></strong>',
                    message: 'Your order ['+ data.id +'] is Canceled'
                },{
                    type: 'danger'
                });
            }
        });
    </script>

</body>
