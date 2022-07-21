<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
    <meta name="Copyright" content="Made with love by COODIV.NET all rights reserved">
    <title>{{ $page_title.' | '.  trans('ArtMarket') }}</title>

    <x-meta />

    <!-- Styles -->
    @vite(['resources/css/bootstrap.css'])
    <link rel="stylesheet" media="all" href="{{asset("website/fonts/sofia-pro/typographie.css")}}" />
    <link rel="stylesheet" media="all" href="{{asset("website/fonts/fontawesome-5/css/all.css")}}" />
    @if(app()->getLocale()=='ar')
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
        <style>
            body {
                font-family: 'DroidArabicKufiRegular', serif !important;
                font-weight: initial;
                font-style: initial;
            }
        </style>
    @endif
    @vite(['resources/css/app.css','resources/css/fancybox.min.css'])
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    @livewireStyles
    @stack('css')
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
@stack('js')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@livewireScripts
</body>
</html>
