<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta charset="utf-8">
<title>{{$page_title.' | VIANET'}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- SEO Meta
      ================================================== -->
 @include('website.partials.css.meta')
<!-- CSS
  ================================================== -->
 @include('website.partials.css.style')

    @stack('css')
</head>
<body class="homepage">
<div class="se-pre-con"></div>
    <!-- newslatter-popup Start -->

    @include('website.partials.newslatter.top')

    <!-- newslatter-popup End -->
<div class="main contact-main">

  {{-- Include some data --}}
    @php
      $cart_items = Gloudemans\Shoppingcart\Facades\Cart::content();
      $settings = App\Modules\SettingsLogic\Models\Setting::get();
      $categories = App\Modules\CategoriesLogic\Models\Category::query()->where('is_active',1)->whereHas('products')->get();
    @endphp

  <!-- Popup Links Start -->
  <div class="popup-part">

    @include('website.partials.popup.popup-links')
    @include('website.partials.popup.popup-containt')

  </div>

  <!-- Popup Links End -->

  <!-- HEADER START -->
  <header class="navbar navbar-custom container-full-sm" id="header">
        @include('website.partials.headers.header-top')
        @include('website.partials.headers.header-middle')
         @include('website.partials.headers.header-bottom')
  </header>
  <!-- HEADER END -->
  <div class="container">
    @include('partials.error.error')
  </div>

  @yield('content')

  <!-- CONTAINER END -->

  <!-- News Letter Start -->
  @include('website.partials.newslatter.bottom')
  <!-- News Letter End -->

  <!-- FOOTER START -->
  @include('website.partials.footers.footer')

  <div class="scroll-top">
    <div class="scrollup"></div>
  </div>
  <!-- FOOTER END -->
</div>

@include('website.partials.js.scripts')
@stack('js')

</body>
</html>
