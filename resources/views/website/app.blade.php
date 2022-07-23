<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
    <meta name="Copyright" content="Made with love by COODIV.NET all rights reserved">
    <title>{{ $page_title.' | '.  trans('ArtMarket') }}</title>

    <x-meta/>

    <!-- Styles -->
    @vite(['resources/css/bootstrap.css'])
    @if(app()->getLocale()=='ar')
        @vite(['resources/css/bootstrap-rtl.css'])
    @endif
    <link rel="stylesheet" media="all" href="{{asset("website/fonts/sofia-pro/typographie.css")}}"/>
    <link rel="stylesheet" media="all" href="{{asset("website/fonts/fontawesome-5/css/all.css")}}"/>

    @vite(['resources/css/app.css','resources/css/fancybox.min.css',])
    @if(app()->getLocale()=='ar')
        @vite(['resources/css/app-rtl.css'])

    @endif
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @livewireStyles
    @stack('css')
</head>
<body>

<script src="{{asset("website/js/lib/jquery.min.js")}}"></script>


<div class="outer">


    <!--header-->
    <x-header/>

    <div class="outer__inner">
        @yield('content')
    </div>
    <!-- footer-->
    <x-footer/>

</div>
<!-- Scripts -->
@include('website.scripts')
@stack('js')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@livewireScripts

</body>
</html>
