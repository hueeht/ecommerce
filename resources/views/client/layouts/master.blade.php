<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <!-- Basic page needs -->
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@lang('shop.title')</title>
    <meta name="google" content="clean template, electronics Store, html5, electronics template, makeup store, modern, multipurpose store, electronics shop, commerce, ecommerce, electronics, electronics theme, megamenu, modern, retail, store"/>

    <!-- Mobile specific metas  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon  -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/images/favicon.ico')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" href="{{ asset('bower_components/client_bower/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Fontawesome css-->
    <link rel="stylesheet" href="{{ asset('bower_components/client_bower/font-awesome/css/font-awesome.min.css') }}">

    <!-- simple-line-icons css-->
    <link rel="stylesheet" href="{{ asset('bower_components/client_bower/simple-line-icons/css/simple-line-icons.css') }}">

    <!-- pe-icon-7-stroke.min css-->
    <link rel="stylesheet" href="{{ asset('bower_components/client_bower/pixeden-stroke-7-icon/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css') }}">

    <!-- owl.carousel.min css-->
    <link rel="stylesheet" href="{{asset('bower_components/client_bower/owl.carousel/dist/assets/owl.carousel.min.css')}}">

    <!-- jtv-mobile-menu css-->
    <link rel="stylesheet" href="{{asset('bower_components/client_bower/jtv-menu/jtv-mobile-menu.css')}}">

    <!-- jevolution-slider css-->
    <link rel="stylesheet" href="{{asset('bower_components/client_bower/slider-rev/revolution-slider.css')}}">

    <!-- style css-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class="cms-index-index cms-home-page">
    <!-- Header -->
    @include('client.layouts.header')
    @yield('content')
    @include('client.layouts.footer')
    <!-- jquery js -->
    <script src="{{asset('bower_components/client_bower/jquery/dist/jquery.min.js')}}"></script>

    <!-- bootstrap js -->
    <script src="{{asset('bower_components/client_bower/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- owl.carousel.min js -->
    <script src="{{asset('bower_components/client_bower/owl.carousel/dist/owl.carousel.min.js')}}"></script>

    <!-- jtv-jtv-mobile-menu js -->
    <script src="{{asset('bower_components/client_bower/jtv-menu/jtv-mobile-menu.js')}}"></script>

    <!-- countdown js -->
    <script src="{{asset('bower_components/client_bower/countdown/dest/countdown.js')}}"></script>

    <!-- rev-slider js -->
    <script src="{{asset('bower_components/client_bower/slider-rev/rev-slider.js')}}"></script>

    <!-- main js -->
    <script src="{{asset('js/app.js')}}"></script>

</body>
