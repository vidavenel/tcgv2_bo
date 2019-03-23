 <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('css')
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
    @include('bo::layouts.header', ['user' => $admin])

    @include('bo::layouts.sidebar', ['user' => $admin])

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include("bo::layouts.breadcumb")
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('bo::layouts.footer')

    @include('bo::layouts.control-sidebar')
</div>
@include('bo::shared.modal_search_commande')
<!-- ./wrapper -->
<script src="{{ mix('js/admin.js') }}"></script>
@yield('js')
</body>
</html>
