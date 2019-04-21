<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Topcartegrise | Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<noscript>
    <p class="alert alert-danger">
        You need to turn on your javascript. Some functionality will not work if this is disabled.
        <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
    </p>
</noscript>
<!-- Site wrapper -->
<div class="wrapper">
    @include('bo::layouts.header')

    @include('bo::layouts.sidebar', ['user' => $admin])

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include("bo::layouts.breadcumb")
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('bo::layouts.footer')
</div>
@include('bo::shared.modal_search_commande')
<!-- ./wrapper -->
<script src="{{ asset('vendor/tcgv2_bo/js/main.js') }}"></script>
</body>
</html>
