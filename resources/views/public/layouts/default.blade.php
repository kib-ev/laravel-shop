<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>{!! meta('title') ?: __('ui.error')  !!} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--Less styles -->
    <!-- Other Less css file //different less files has different color schema
     <link rel="stylesheet/less" type="text/css" href="/themes/less/simplex.less">
     <link rel="stylesheet/less" type="text/css" href="/themes/less/classified.less">
     <link rel="stylesheet/less" type="text/css" href="/themes/less/amelia.less">  MOVE DOWN TO activate
     -->
    <!--<link rel="stylesheet/less" type="text/css" href="/themes/less/bootshop.less">
    <script src="/themes/js/less.js" type="text/javascript"></script> -->

    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="{{ asset('/themes/bootshop/bootstrap.min.css') }}" media="screen"/>
    <link href="/themes/css/base.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->
    <link href="/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->
    <link href="/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
</head>
<body>
@if(request()->has('meta'))
    @include('public.layouts.includes.meta')
@endif
@include('public.layouts.includes.header')
<!-- Header End====================================================================== -->

@yield('carousel')

<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            @yield('sidebar')

            <!-- Content ================================================== -->
            @yield('content')

        </div>

        <!-- Content ================================================== -->
        @yield('content-full')
    </div>
</div>

<!-- Footer ================================================================== -->
@include('public.layouts.includes.footer')

<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="/themes/js/jquery.js" type="text/javascript"></script>
<script src="/themes/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/themes/js/google-code-prettify/prettify.js"></script>

<script src="/themes/js/bootshop.js"></script>
<script src="/themes/js/jquery.lightbox-0.5.js"></script>

<!-- Themes switcher section ============================================================================================= -->
@include('public.layouts.includes.themes-switcher')

</body>
</html>
