<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$page_title .' | ArtMarket'}}</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    @include('layouts.extra.meta')

    @include('layouts.extra.css')
    @stack('css')

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <!-- [ Pre-loader ] end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- [ Header ] start -->
           @include('layouts.navbars.navbar')
            <!-- [ chat user list ] start -->

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                    @include('layouts.navbars.sidebar')

                    <!-- [ navigation menu ] end -->
                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->

                         @include('layouts.headers.header')

                        <!-- [ breadcrumb ] end -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <!-- [ page content ] start -->


                                            @yield('content')


                                        <!-- [ page content ] end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ style Customizer ] start -->
                    <div id="styleSelector">
                    </div>
                    <!-- [ style Customizer ] end -->
                </div>
            </div>
            {{-- <footer class="text-end text-dark" style="z-index: 999;!important ;padding: 15px 0;background-color:#efefef;
                bottom: 0;
                width: 100%;
                padding-top: 15px;
                ">
                <span class="mx-2">Made with <img src="https://img.icons8.com/emoji/48/000000/heart-suit.png" width="25"/> by <a target="_blank" href="https://coodiv.net/" class="text-primary"> COODIV.NET</a>.All rights reserved</span>
            </footer> --}}
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade
            <br/>to any of the following web browsers to access this website.
        </p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="../files/assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="../files/assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="../files/assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    @include('layouts.extra.js')
    @stack('js')

{{--     <script >
        @if(Session::has('success'))

               toastr.success("{{ Session::get('success') }}")


        @endif


        @if(Session::has('orange'))

               toastr.info("{{ Session::get('orange') }}")


        @endif


        @if(Session::has('error'))

               toastr.error("{{ Session::get('error') }}")


        @endif
    </script> --}}



{{-- @include('content.modals.profile') --}}
</body>

</html>
