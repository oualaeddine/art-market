<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <title>{{ config('app.name', 'Laravel') }}</title>

    <x-meta />

    <!-- Styles -->
    @vite(['resources/css/bootstrap.css'])
    <link rel="stylesheet" media="all" href="website/fonts/sofia-pro/typographie.css" />
    <link rel="stylesheet" media="all" href="website/fonts/fontawesome-5/css/all.css" />
    @vite(['resources/css/app.css'])

</head>
<body>



<div class="outer">


    <!--header-->
    <x-header />

    <div class="outer__inner">
            @yield('content')
    </div>
    <!-- footer-->
    <x-footer />

</div>

@include('WebsiteUi::style')
    <!-- Scripts -->


</body>
</html>
