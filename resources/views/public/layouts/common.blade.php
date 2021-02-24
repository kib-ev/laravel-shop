<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('/libs/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/libs/slick/slick.css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('/libs/slick/slick.css/slick.css') }}">
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/less/style.less') }}">
    <script src="{{ asset('/libs/less.js/4.1.1/less.js') }}"></script>
    <title>PERIPARTS</title>
</head>

<body>

@if(auth()->check() && request()->has('meta'))
    @include('public.layouts.includes.metas')
@endif

<div id="full--page">
    @include('public.layouts.includes.header')

    @yield('carousel')

    @yield('content')

    @include('public.layouts.includes.footer')
</div>

<script src="{{ asset('/libs/jquery/3.5.0/jquery.js') }}"></script>
<script src="{{ asset('/libs/slick/slick.js/slick.min.js') }}"></script>
<script src="{{ asset('/libs/less.js/4.1.1/less.js') }}"></script>
<script src="{{ asset('/libs/main.js') }}"></script>
</body>

</html>
