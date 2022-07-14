<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <title>{{ config('app.name', 'Laravel') }}</title>

    <x-meta />

    <!-- Styles -->
    @vite(['resources/css/bootstrap.css'])
    <link rel="stylesheet" media="all" href="{{asset("website/fonts/sofia-pro/typographie.css")}}" />
    <link rel="stylesheet" media="all" href="{{asset("website/fonts/fontawesome-5/css/all.css")}}" />
    @vite(['resources/css/app.css','resources/css/fancybox.min.css'])
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


</head>
<body>

<script src="{{asset("website/js/lib/jquery.min.js")}}"></script>


<div class="outer">


    <!--header-->
    <x-header />

    <div class="outer__inner">
            @yield('content')
    </div>
    <!-- footer-->
    <x-footer />

</div>
<!-- Scripts -->
@include('website.scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

</body>
</html>
