@extends('website.layouts.master')

@section('content')

    <style>
        .cat-dropdown .nav > li.level:hover .megamenu {
            top: 10%;
        }

        .cat-dropdown .navbar-nav > li > a {
            color: #041e42;
        }

        @media (max-width: 991px) {
            .cat-dropdown .navbar-nav > li > a {
                color: #fff;
            }
        }

        .card {

             border: 0px solid rgba(0, 0, 0, 0.125);
        }
    </style>
    <div class="container-fluid" style="width: 90%;">

        <div class="card mt-3  p-3">
            <div class="row">
                <div class="col-lg-3 ">
                    <div class="cat-dropdown rounded-lg shadow-sm">
                        <div class="sidebar-contant">

                            <div id="menu" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav ">
                                    @foreach($categories as $category)
                                        @if($category->sub_categories?->isNotEmpty())
                                            <li class="level sub-megamenu">
                                                <span class="opener plus"></span>
                                                <a href=" {{route('shop',['c'=>\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr])}}"
                                                   class="page-scroll">{{\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr}}</a>
                                                <div class="megamenu mobile-sub-menu overflow-auto"
                                                     style="    width: 332%;/* width: 430px; */height:100%">
                                                    <div class="flex-column h-100 row w-100">
                                                        @foreach($category?->sub_categories as $category)
                                                            <div class="w-20 mr-3 d-flex flex-column">
                                                                <div class="mt-1"><a
                                                                        href=" {{route('shop',['c'=>\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr])}}"
                                                                         style="font-weight: 700;">{{\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr}}</a>
                                                                </div>
                                                                <div class="">
                                                                    @foreach($category?->sub_categories as $category)
                                                                        <div class="mt-1"
                                                                             @if($loop->first) style="border-top: 1px solid #ededed;" @endif>
                                                                            <a
                                                                                href=" {{route('shop',['c'=>\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr])}}"
                                                                            >{{\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr}}</a></div>
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>

                                        @else
                                            <li class="level">
                                                <a href="{{route('shop',['c'=>\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr])}}"
                                                   class="page-scroll">{{\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr}}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <section class="banner-main">
                        <div class="banner">
                            <div class="main-banner owl-carousel">
                                @foreach ($slider as $item)
                                    <div class="item">
                                        <div class="banner-1">

                                            @if ($item->image != null)
                                                <img style="" src="{{asset($item->image)}}" class="" alt="Null">
                                            @else
                                                <img style="" src="/website/assets/images/banner1.jpg" alt="Null">
                                            @endif
                                            <div class="banner-detail">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-4 col-4"></div>
                                                        <div class="col-lg-7 col-md-8 col-8">
                                                            <div class="banner-detail-inner">
                                                                <span class="slogan">{{$item->title}}</span>
                                                                <h1 class="banner-title animated">{{$item->main_title}}</h1>
                                                                <p class="offer">{{$item->sub_title}}</p>
                                                                <a class="btn btn-color"
                                                                   href="{{$item->link}}">{{__("Acheter maintenant")}}
                                                                    !</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTAIN START -->

    <!-- SUB-BANNER START -->
    <div class="sub-banner-block ">
        <div class="">
            <div class="">
                <div class="row mlr_-10">
                    @foreach ($tops as $item)

                        <div class="col-md-4 plr-10">
                            <div class="sub-banner sub-banner1">
                                @if ($item->image != null)
                                    <img style="" src="{{asset($item->image)}}" alt="Null">
                                @else
                                    <img style="" alt="Stylexpo" src="/website/assets/images/sub-banner1.jpg">
                                @endif

                                <div class="sub-banner-detail">
                                    <div class="sub-banner-slogan">{{$item->title}}</div>
                                    <div class="sub-banner-title sub-banner-title-color">{{$item->main_title}}</div>
                                    <div class="sub-banner-subtitle">{{$item->sub_title}}</div>
                                    {{--                                    @if($item->type==='product')--}}
                                    <a class="btn btn-color"
                                       href="{{$item->link}}">{{__("Acheter maintenant")}}
                                        !</a>
                                    {{--                                    @else--}}
                                    {{--                                        <a class="btn btn-color"--}}
                                    {{--                                           href="{{route('shop',['c'=>$item->product_id])}}">{{__("Acheter maintenant")}}--}}
                                    {{--                                            !</a>--}}
                                    {{--                                    @endif--}}
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- SUB-BANNER END -->

    <!--  New arrivals Products Slider Block Start  -->
    <section class="pt-70">
        <div class="container">
            <div class="product-listing">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-part mb-30">
                            <h2 class="main_title heading"><span>{{__("Nouveautés")}}</span></h2>
                        </div>
                    </div>
                </div>
                <div class="pro_cat">
                    <div class="row">

                        @if ($new_arrived->isNotEmpty())

                            <div class="owl-carousel pro-cat-slider">
                                @foreach ($new_arrived as $b)

                                    <div class="item">
                                        <div class="product-item">
                                            {{-- <div class="main-label new-label"><span>New</span></div> --}}
                                            <div class="product-image shadow"><a href="{{route('product',$b->slug)}}">
                                                    @if ($b->image != null)
                                                        <img src="{{asset($b->image)}}" style="    background-repeat: no-repeat;
    background-position: 50% 50%;
    ;" class="image-home" alt="Stylexpo">
                                                    @else
                                                        <img src="/website/assets/images/product/product_1_md.jpg"
                                                             alt="Stylexpo">
                                                    @endif
                                                </a>
                                                <div class="product-detail-inner">
                                                    <div class="detail-inner-left align-center">
                                                        <ul>
                                                            <li class="pro-cart-icon">
                                                                <form>
                                                                    <button type="button" class="add-to-cart"
                                                                            data-id="{{$b->id}}"
                                                                            title="Ajouter au panier">
                                                                        <span></span>{{__("Ajouter au panier")}}
                                                                    </button>
                                                                </form>
                                                            </li>
                                                            {{-- <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li> --}}
                                                            {{--     <li class="pro-compare-icon"><a href="{{route('compare')}}" title="Compare"></a></li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item-details">
                                                <div class="product-item-name font-weight-bold"><a
                                                        href="{{route('product',$b->slug)}}">
                                                        @if(\Illuminate\Support\Facades\Session::get('client_lang'))
                                                            {{$b->name_ar}}
                                                        @else
                                                            {{$b->name_fr}}

                                                        @endif

                                                    </a></div>
                                                <div class="price-box"><span
                                                        class="price">{{number_format($b->price, 2, '.', ',')}} {{__("DA")}} </span>
                                                    <del
                                                        class="price old-price"> {{number_format($b->price_old, 2, '.', ',')}} {{__("DA")}}</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>

                        @else

                            <div class="col-12 text-center">


                                <img src="{{asset('data-none.png')}}" style="width: 200px" alt="">
                                <h4 class="section-title">{{__("aucune donnée n'a été trouvée")}}</h4>

                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  New arrivals Products Slider Block End  -->

    <!-- Top Categories Start-->
    <section class=" pt-70">
        <div class="top-cate-bg ptb-70">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-part mb-30">
                            <h2 class="main_title heading"><span>{{__("Catégories principales")}}</span></h2>
                        </div>
                    </div>
                </div>
                <div class="pro_cat">
                    <div class="row">
                        @if ($top_categories->isNotEmpty())

                            <div id="top-cat-pro" class="owl-carousel sell-pro align-center">
                                @foreach ($top_categories as $c)
                                    <div class="item ">
                                        <a href="{{route('shop',['c'=>\Illuminate\Support\Facades\Session::get('client_lang')?$c->name_ar:$c->name_fr])}}">
                                            <div class="item-inner">

                                                @if ($c->icon != null)
                                                    <img src="{{asset($c->icon)}}" class="category-home" alt="Stylexpo">
                                                @else
                                                    <img src="/website/assets/images/cate_1.jpg" style="    background-repeat: no-repeat;
    background-position: 50% 50%;
    ;" alt="Stylexpo">
                                                @endif

                                                <div class="effect"></div>
                                                <div class="cate-detail">
                                                    <span>{{\Illuminate\Support\Facades\Session::get('client_lang')?$c->name_ar:$c->name_fr}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                @endforeach

                            </div>

                        @else

                            <div class="col-12 text-center">


                                <img src="{{asset('data-none.png')}}" style="width: 200px" alt="">
                                <h4 class="section-title">{{__("aucune donnée n'a été trouvée")}}</h4>

                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Categories End-->

    <!-- perellex-banner Start -->
    <section>
        @if ( !is_null($banner) && $banner->image != null)
            <div class="perellex-banner"
                 style='background: rgba(0, 0, 0, 0) url("{{asset($banner->image)}}") no-repeat fixed center center'>
                @else
                    <div class="perellex-banner"
                         style='background: rgba(0, 0, 0, 0) url("/website/assets/images/perellex.jpg") no-repeat fixed center center'>
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2 ptb-70 client-box">
                                    <div class="perellex-delail align-center">
                                        <div class="perellex-offer"><span
                                                class="line-bottom">{{$banner->title??'example titre'}}</span></div>
                                        <div class="perellex-title ">{{$banner->main_title??' example titre'}} </div>
                                        <p>{{$banner->sub_title??' example titre'}}</p>
                                        {{--                                        @if($banner->type==='product')--}}
                                        <a class="btn btn-color"
                                           href="{{$banner->link}}">{{__("Acheter maintenant")}}
                                            !</a>
                                        {{--                                        @else--}}
                                        {{--                                            <a class="btn btn-color"--}}
                                        {{--                                               href="{{route('shop',['c'=>$banner->product_id])}}">{{__("Acheter maintenant")}}--}}
                                        {{--                                                !</a>--}}
                                        {{--                                        @endif--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    </section>
    <!-- perellex-banner End -->

    <!-- Daily Deals Start -->
    <section class=" ptb-70">
        <div class="container">
            <div class="daily-deals">
                <div class="row m-0">
                    <div class="col-12 p-0">
                        <div class="heading-part mb-30">
                            <h2 class="main_title heading"><span>{{__("Offres du jour")}}</span></h2>
                        </div>
                    </div>
                </div>
                <div class="pro_cat">
                    <div class="row">

                        @if ($daily_deals->isNotEmpty())

                            <div id="daily_deals" class="owl-carousel ">

                                @foreach ($daily_deals as $b)

                                    <div class="item">
                                        <div class="product-item">
                                            <div class="row ">
                                                <div class="col-md-6 col-12 deals-img ">
                                                    <div class="product-image shadow">
                                                        <a href="{{route('product',$b->slug)}}">
                                                            @if ($b->image != null)
                                                                <img style="    background-repeat: no-repeat;
    background-position: 50% 50%;
    ;" src="{{asset($b->image)}}" class="image-home" alt="Stylexpo">
                                                            @else
                                                                <img
                                                                    src="/website/assets/images/product/product_1_md.jpg"
                                                                    style="    background-repeat: no-repeat;
    background-position: 50% 50%;
    ;" alt="Stylexpo">
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mt-xs-30">
                                                    <div class="product-item-details">
                                                        <div class="product-item-name font-weight-bold">
                                                            <a href="{{route('product',$b->slug)}}">   @if(\Illuminate\Support\Facades\Session::get('client_lang'))
                                                                    {{$b->name_ar}}
                                                                @else
                                                                    {{$b->name_fr}}
                                                                @endif</a>
                                                        </div>
                                                        <div class="price-box">
                                                            <span
                                                                class="price"> {{number_format($b->price, 2, '.', ',')}} {{__("DA")}}</span>
                                                            <del
                                                                class="price old-price">{{number_format($b->price_old, 2, '.', ',')}} {{__("DA")}}</del>
                                                        </div>
                                                        <div class="product-item-name font-weight-bold">
                                                            <a href="{{route('shop')}}">{{$b->vendor->name_fr}}</a>
                                                        </div>
                                                        @if(\Illuminate\Support\Facades\Session::get('client_lang'))
                                                            <p>{{$b->desc_ar}}</p>

                                                        @else
                                                            <p>{{$b->desc_fr}}</p>
                                                        @endif
                                                    </div>
                                                    <div class="product-detail-inner">
                                                        <div class="detail-inner-left">
                                                            <ul>
                                                                <li class="pro-cart-icon">
                                                                    <form>
                                                                        <button type="button" title="Ajouter au panier"
                                                                                class="add-to-cart"
                                                                                data-id="{{$b->id}}">
                                                                            <span></span>{{__("Ajouter au panier")}}
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                                {{-- <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li> --}}
                                                                {{--    <li class="pro-compare-icon"><a href="{{route('compare')}}" title="Compare"></a></li> --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="item-offer-clock">
                                                      <ul class="countdown-clock">
                                                        <li>
                                                          <span class="days">00</span>
                                                          <p class="days_ref">days</p>
                                                        </li>
                                                        <li class="seperator">:</li>
                                                        <li>
                                                          <span class="hours">00</span>
                                                          <p class="hours_ref">hrs</p>
                                                        </li>
                                                        <li class="seperator">:</li>
                                                        <li>
                                                          <span class="minutes">00</span>
                                                          <p class="minutes_ref">min</p>
                                                        </li>
                                                        <li class="seperator">:</li>
                                                        <li>
                                                          <span class="seconds">00</span>
                                                          <p class="seconds_ref">sec</p>
                                                        </li>
                                                      </ul>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>

                        @else

                            <div class="col-12 text-center">


                                <img src="{{asset('data-none.png')}}" style="width: 200px" alt="">
                                <h4 class="section-title">{{__("aucune donnée n'a été trouvée")}}</h4>

                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Daily Deals End -->

    <!--  Site Services Features Block Start  -->
    {{--    <div class="ser-feature-block">--}}
    {{--        <div class="container">--}}
    {{--            <div class="center-xs">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-xl-3 col-6 service-box">--}}
    {{--                        <div class="feature-box ">--}}
    {{--                            <div class="feature-icon feature1"></div>--}}
    {{--                            <div class="feature-detail">--}}
    {{--                                <div--}}
    {{--                                    class="ser-title">{{$icons->where('name','Icon 1')->first()->main_title??'Livraison gratuite'}} </div>--}}
    {{--                                <div--}}
    {{--                                    class="ser-subtitle">{{$icons->where('name','Icon 1')->first()->sub_title??'0.59 DA'}}</div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-xl-3 col-6 service-box">--}}
    {{--                        <div class="feature-box">--}}
    {{--                            <div class="feature-icon feature2"></div>--}}
    {{--                            <div class="feature-detail">--}}
    {{--                                <div--}}
    {{--                                    class="ser-title">{{$icons->where('name','Icon 2')->first()->main_title??'Livraison gratuite'}} </div>--}}
    {{--                                <div--}}
    {{--                                    class="ser-subtitle">{{$icons->where('name','Icon 2')->first()->sub_title??'0.59 DA'}}</div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-xl-3 col-6 service-box">--}}
    {{--                        <div class="feature-box ">--}}
    {{--                            <div class="feature-icon feature3"></div>--}}
    {{--                            <div class="feature-detail">--}}
    {{--                                <div--}}
    {{--                                    class="ser-title">{{$icons->where('name','Icon 3')->first()->main_title??'Livraison gratuite'}} </div>--}}
    {{--                                <div--}}
    {{--                                    class="ser-subtitle">{{$icons->where('name','Icon 3')->first()->sub_title??'0.59 DA'}}</div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-xl-3 col-6 service-box">--}}
    {{--                        <div class="feature-box ">--}}
    {{--                            <div class="feature-icon feature4"></div>--}}
    {{--                            <div class="feature-detail">--}}
    {{--                                <div--}}
    {{--                                    class="ser-title">{{$icons->where('name','Icon 4')->first()->main_title??'Livraison gratuite'}} </div>--}}
    {{--                                <div--}}
    {{--                                    class="ser-subtitle">{{$icons->where('name','Icon 4')->first()->sub_title??'0.59 DA'}}</div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!--  Site Services Features Block End  -->

    <!--small banner Block Start-->
    {{--     <section class="pt-70">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="sub-banner small-banner small-banner1">
                  <a href="shop.html">
                    <img src="/website/assets/images/small-banner1.jpg" alt="Stylexpo">
                  </a>
                </div>
              </div>
              <div class="col-lg-6 mt-sm-30">
                <div class="sub-banner small-banner small-banner2">
                  <a href="shop.html">
                    <img src="/website/assets/images/small-banner2.jpg" alt="Stylexpo">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section> --}}
    <!--small banner Block Start-->

    <!--  Special products Products Slider Block Start  -->
    <section class="ptb-70">
        <div class="container">
            <div class="product-listing">
                <div class="row">
                    {{--    <div class="col-md-6 col-12">
                         <div class="row">
                           <div class="col-12">
                             <div class="heading-part mb-30">
                               <h2 class="main_title heading"><span>Meilleur vendeur</span></h2>
                             </div>
                           </div>
                         </div>
                         <div class="pro_cat">
                           <div class="row">

                             @if ($best_seller->isNotEmpty())

                             <div class="owl-carousel best-seller-pro">
                               @foreach ($best_seller as $b)

                               <div class="item">
                                 <div class="product-item ">

                                   <div class="product-image shadow"> <a href="{{route('product',$b->slug)}}">
                                     @if ($b->image != null)
                                       <img src="{{asset($b->image)}}" class="image-home" alt="Stylexpo">
                                     @else
                                       <img src="/website/assets/images/product/product_1_md.jpg" alt="Stylexpo">
                                     @endif
                                   </a>
                                     <div class="product-detail-inner">
                                       <div class="detail-inner-left align-center">
                                         <ul>
                                           <li class="pro-cart-icon">
                                             <form>
                                               <button type="button" class="add-to-cart" data-id="{{$b->id}}" title="Ajouter au panier"><span></span>Ajouter au panier</button>
                                             </form>
                                           </li>

                                         </ul>
                                       </div>
                                     </div>
                                   </div>
                                   <div class="product-item-details">
                                     <div class="product-item-name"> <a href="{{route('product',$b->slug)}}">{{$b->name_fr}}</a> </div>
                                     <div class="price-box"> <span class="price"> {{number_format($b->price, 2, '.', ',')}} DA</span> <del class="price old-price"> {{number_format($b->price_old, 2, '.', ',')}} DA</del> </div>
                                   </div>
                                 </div>
                               </div>

                               @endforeach

                             </div>


                             @else

                             <div class="col-12 text-center">


                               <img src="{{asset('data-none.png')}}" style="width: 200px"  alt="">
                               <h4 class="section-title">aucune donnée n'a été trouvée</h4>

                             </div>

                             @endif

                           </div>
                         </div>
                       </div> --}}
                    <div class="col-md-12 col-12 mt-xs-30">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading-part mb-30">
                                    <h2 class="main_title heading"><span>{{__("Nouveaux produits")}} </span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="pro_cat">
                            <div class="row">

                                @if ($new_products->isNotEmpty())

                                    <div class="owl-carousel pro-cat-slider">
                                        @foreach ($new_products as $b)

                                            <div class="item">
                                                <div class="product-item">
                                                    {{-- <div class="main-label new-label"><span>New</span></div> --}}
                                                    <div class="product-image shadow"><a
                                                            href="{{route('product',$b->slug)}}">
                                                            @if ($b->image != null)
                                                                <img src="{{asset($b->image)}}" style="    background-repeat: no-repeat;
    background-position: 50% 50%;
    ;" class="image-home" alt="Stylexpo">
                                                            @else
                                                                <img
                                                                    src="/website/assets/images/product/product_1_md.jpg"
                                                                    style="    background-repeat: no-repeat;
    background-position: 50% 50%;
    ;" alt="Stylexpo">
                                                            @endif
                                                        </a>
                                                        <div class="product-detail-inner">
                                                            <div class="detail-inner-left align-center">
                                                                <ul>
                                                                    <li class="pro-cart-icon">
                                                                        <form>
                                                                            <button type="button" class="add-to-cart"
                                                                                    data-id="{{$b->id}}"
                                                                                    title="Ajouter au panier">
                                                                                <span></span>{{__("Ajouter au panier")}}
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                    {{-- <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li> --}}
                                                                    {{--     <li class="pro-compare-icon"><a href="{{route('compare')}}" title="Compare"></a></li> --}}
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-item-details">
                                                        <div class="product-item-name font-weight-bold"><a
                                                                href="{{route('product',$b->slug)}}">{{\Illuminate\Support\Facades\Session::get('client_lang')?$b->name_ar:$b->name_fr}}</a>
                                                        </div>
                                                        <div class="price-box"><span
                                                                class="price">{{number_format($b->price, 2, '.', ',')}} {{__("DA")}} </span>
                                                            <del
                                                                class="price old-price"> {{number_format($b->price_old, 2, '.', ',')}} {{__("DA")}}</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach

                                    </div>

                                @else

                                    <div class="col-12 text-center">


                                        <img src="{{asset('data-none.png')}}" style="width: 200px" alt="">
                                        <h4 class="section-title">{{__("aucune donnée n'a été trouvée")}}</h4>

                                    </div>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Special products Products Slider Block End  -->

    <!--Blog Block Start -->
    {{-- <section class="pb-70">
      <div class="container">
        <div class="row">
          <div class="col-12 ">
            <div class="heading-part mb-30">
              <h2 class="main_title heading"><span>Latest News</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div id="blog" class="owl-carousel">
            <div class="item mb-md-30">
              <div class="blog-item">
                <div class="">
                <div class="blog-media">
                  <img src="/website/assets/images/blog/blog_img1_md_home.jpg" alt="Stylexpo">
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                </div>
                <div class="mt-20">
                  <div class="blog-detail">
                    <div class="post-date"><span>22</span> / Aug 2020 </div>
                    <div class="blog-title"><a href="single-blog.html">Combined with a handful of model</a></div>
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life.</p>
                    <hr>
                    <div class="post-info mt-2">
                      <ul>
                        <li><span>By</span><a href="#"> cormon jons</a></li>
                        <li>
                          <a href="single-blog.html">Read more
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item mb-md-30">
              <div class="blog-item">
                <div class="blog-media">
                  <img src="/website/assets/images/blog/blog_img2_md_home.jpg" alt="Stylexpo">
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-20">
                  <div class="blog-detail">
                    <div class="post-date"><span>22</span> / Aug 2020 </div>
                    <div class="blog-title"><a href="single-blog.html">Combined with a handful of model</a></div>
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life.</p>
                    <hr>
                    <div class="post-info mt-2">
                      <ul>
                        <li><span>By</span><a href="#"> cormon jons</a></li>
                        <li>
                          <a href="single-blog.html">Read more
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media">
                  <img src="/website/assets/images/blog/blog_img3_md_home.jpg" alt="Stylexpo">
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-20">
                  <div class="blog-detail">
                    <div class="post-date"><span>22</span> / Aug 2020 </div>
                    <div class="blog-title"><a href="single-blog.html">Combined with a handful of model</a></div>
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life.</p>
                    <hr>
                    <div class="post-info mt-2">
                      <ul>
                        <li><span>By</span><a href="#"> cormon jons</a></li>
                        <li>
                          <a href="single-blog.html">Read more
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media">
                  <img src="/website/assets/images/blog/blog_img4_md_home.jpg" alt="Stylexpo">
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-20">
                  <div class="blog-detail">
                    <div class="post-date"><span>22</span> / Aug 2020 </div>
                    <div class="blog-title"><a href="single-blog.html">Combined with a handful of model</a></div>
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life.</p>
                    <hr>
                    <div class="post-info mt-2">
                      <ul>
                        <li><span>By</span><a href="#"> cormon jons</a></li>
                        <li>
                          <a href="single-blog.html">Read more
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media">
                  <img src="/website/assets/images/blog/blog_img5_md_home.jpg" alt="Stylexpo">
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-20">
                  <div class="blog-detail">
                    <div class="post-date"><span>22</span> / Aug 2020 </div>
                    <div class="blog-title"><a href="single-blog.html">Combined with a handful of model</a></div>
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life.</p>
                    <hr>
                    <div class="post-info mt-2">
                      <ul>
                        <li><span>By</span><a href="#"> cormon jons</a></li>
                        <li>
                          <a href="single-blog.html">Read more
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media">
                  <img src="/website/assets/images/blog/blog_img6_md_home.jpg" alt="Stylexpo">
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-20">
                  <div class="blog-detail">
                    <div class="post-date"><span>22</span> / Aug 2020 </div>
                    <div class="blog-title"><a href="single-blog.html">Combined with a handful of model</a></div>
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life.</p>
                    <hr>
                    <div class="post-info mt-2">
                      <ul>
                        <li><span>By</span><a href="#"> cormon jons</a></li>
                        <li>
                          <a href="single-blog.html">Read more
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <!--Blog Block End -->

    <!-- Brand logo block Start  -->
    <div class="brand-logo pb-70">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <div class="heading-part mb-30">
                        <h2 class="main_title heading"><span>{{__("Nos marques")}}</span></h2>
                    </div>
                </div>
            </div>
            <div class=" brand">
                <div class="row">
                    @if ($brands->isNotEmpty())

                        <div id="brand-logo" class="owl-carousel align_center">
                            @foreach ($brands as $brand)
                                <div class="item"><a
                                        href="{{route('shop',['marque'=>\Illuminate\Support\Facades\Session::get('client_lang')?$brand->name_ar:$brand->name_fr])}}"><img
                                            class="shadow-sm" style="  height: 140px;width: 200px; opacity: 1!important;  background-repeat: no-repeat;
    background-position: 50% 50%;" src="{{asset($brand->image)}}"
                                            alt="{{\Illuminate\Support\Facades\Session::get('client_lang')?$brand->name_ar:$brand->name_fr}}"></a>
                                </div>
                            @endforeach
                        </div>

                    @else

                        <div class="col-12 text-center">


                            <img src="{{asset('data-none.png')}}" style="width: 200px" alt="">
                            <h4 class="section-title">{{__("aucune donnée n'a été trouvée")}}</h4>

                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- Brand logo block End  -->

@endsection
