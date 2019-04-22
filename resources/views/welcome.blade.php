<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{url('vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{url('css/style.default.css')}}" id="theme-stylesheet">
        <link rel="stylesheet" href="{{url('css/fontawesome-all.min.css')}}">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{url('img/favicon.ico')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body>
        <div class="page">

            @include('partials.header')
            <div class="page-content d-flex align-items-stretch">
                @include('partials.sidenavbar')


                <div class="content-inner">
                    @include('partials.title')
                    @include('partials.breadcrumb')

@yield('content')
@include('partials.footer')
</div>
</div>
</div>
<!-- JavaScript files-->
<script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('vendor/popper.js/umd/popper.min.js')}}"></script>
<script src="{{url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('vendor/jquery.cookie/jquery.cookie.js')}}"></script>
<script src="{{url('vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{url('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('js/charts-home.js')}}"></script>
  <script src="{{url('js/loadingoverlay.min.js')}}"></script>
<!-- Main File-->
<script src="{{url('js/front.js')}}"></script>
@include('sweetalert::alert')

</body>
</html>
