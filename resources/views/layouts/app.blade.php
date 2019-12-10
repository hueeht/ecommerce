<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href={{ asset('bower_components/bower-ad/vendor/fontawesome-free/css/all.min.css') }} rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href={{ asset('bower_components/bower-ad/vendor/datatables/dataTables.bootstrap4.css') }} rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href={{ asset('bower_components/bower-ad/css/sb-admin.css') }} rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->

                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src={{ asset('bower_components/bower-ad/vendor/jquery/jquery.min.js') }}></script>
    <script src={{ asset('bower_components/bower-ad/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('bower_components/bower-ad/vendor/jquery-easing/jquery.easing.min.js') }}></script>
    <script src={{ asset('bower_components/bower-ad/vendor/datatables/jquery.dataTables.js') }}></script>
    <script src={{ asset('bower_components/bower-ad/vendor/datatables/dataTables.bootstrap4.js') }}></script>
    <script src={{ asset('bower_components/bower-ad/js/sb-admin.min.js') }}></script>
</body>
</html>
