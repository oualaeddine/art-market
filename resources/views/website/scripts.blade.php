
{{--We are using direct libs and not vite cuz all instnace of require in files must be turned to import and since there some .min.js we cant change them--}}

{{--<script src="website/js/vendor.min.js"></script>--}}

<script src="{{asset('website/js/lib/slick.min.js')}}"></script>
<script src="{{asset('website/js/lib/fancybox.js')}}"></script>
<script src="{{asset('website/js/lib/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('website/js/lib/nouislider.min.js')}}"></script>
<script src="{{asset('website/js/lib/wNumb.js')}}"></script>
<script src="{{asset('website/js/lib/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('website/js/lib/jquery.countdown.min.js')}}"></script>

<script src="{{asset('website/js/app.js')}}"></script>

{{--    @vite([--}}
{{--        'resources/js/jquery.min.js',--}}
{{--        'resources/js/app.js',--}}
{{--        'resources/js/card-js.min.js',--}}
{{--        'resources/js/fancybox.js',--}}
{{--        'resources/js/jquery.countdown.min.js',--}}
{{--        'resources/js/jquery.magnific-popup.min.js',--}}
{{--        'resources/js/jquery.nice-select.min.js',--}}
{{--        'resources/js/nouislider.min.js',--}}
{{--        'resources/js/share-buttons.js',--}}
{{--        'resources/js/slick.min.js',--}}
{{--        'resources/js/sticky-sidebar.min.js',--}}
{{--        'resources/js/wNumb.js',--}}
{{--        'resources/js/custom.js',--}}
{{--        'resources/js/vendor.min.js',--}}
{{--    ])--}}
