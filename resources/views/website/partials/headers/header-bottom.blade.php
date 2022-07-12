<div class="header-bottom">
    <div class="container">
        <div class="row position-r">
            <div class="col-xl-2 col-lg-3 col-lgmd-20per position-s">
                <div class="sidebar-menu-dropdown home">
                    {{-- <a class="btn-sidebar-menu-dropdown"><span></span> {{__('Catégories')}} </a> --}}
                    <div id="cat" class="cat-dropdown">
                        <div class="sidebar-contant">
                            <div id="menu" class="navbar-collapse collapse">
                                <div class="top-right-link mobile right-side">
                                    <ul>
                                        <li class="login-icon content">
                                            <a class="content-link">
                                                <span class="content-icon"></span>
                                            </a>
                                            <a href="{{route('client.login')}}"
                                               title="Se connecter">{{__('Se connecter')}}</a> {{__('ou')}}
                                            <a href="{{route('client.register')}}"
                                               title="S'inscrire">{{__("S'inscrire")}}</a>
                                            <div class="content-dropdown">
                                                <ul>
                                                    <li class="login-icon"><a href="{{route('client.login')}}"
                                                                              title="Se connecter"><i
                                                                class="fa fa-user"></i>{{__('Se connecter')}}</a></li>
                                                    <li class="register-icon"><a href="{{route('client.register')}}"
                                                                                 title="S'inscrire"><i
                                                                class="fa fa-user-plus"></i>{{__("S'inscrire")}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="track-icon">
                                            <a href="{{route('order-tracking')}}"
                                               title="Suivez votre commande"><span></span> {{__('Suivez')}}</a>
                                        </li>
                                        <li class="gift-icon">
                                            <a href="" title="Comment utiliser le coupon"><span></span>{{__('Coupon')}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="nav navbar-nav ">
                                    @foreach($categories as $category)
                                        @if($category->sub_categories?->isNotEmpty())

                                            <li class="level sub-megamenu">
                                                <span class="opener plus"></span>
                                                <a
                                                    href=" {{route('shop',['c'=>\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr])}}"

                                                    class="page-scroll"><i class="fa fa-female"></i>{{\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr}}</a>
                                                <div class="megamenu mobile-sub-menu ">
                                                    <div class="megamenu-inner-top">
                                                        <ul class="sub-menu-level1">
                                                            <li class="level2">
                                                                @foreach($category?->sub_categories as $category)
                                                                <a
                                                                    href=" {{route('shop',['c'=>\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr])}}"

                                                                ><span>{{\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr}}</span></a>
                                                                    @foreach($category?->sub_categories as $category)

                                                                    <ul class="sub-menu-level2 ">
                                                                    <li class="level3"><a
                                                                            href=" {{route('shop',['c'=>\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr])}}"

                                                                        ><span>■</span>{{\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr}}</a>
                                                                    </li>
                                                                </ul>
                                                                    @endforeach

                                                                @endforeach

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        @else

                                            <li class="level">
                                                <a
                                                    href=" {{route('shop',['c'=>\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr])}}"

                                                    class="page-scroll">{{\Illuminate\Support\Facades\Session::get('client_lang')?($category->name_ar??$category->name_fr):$category->name_fr}}</a>
                                            </li>
                                        @endif

                                    @endforeach

                                </ul>

                                <div class="header-top mobile">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="top-link top-link-left select-dropdown ">
                                                    <fieldset>
                                                        <select name="speed" class="countr  change-lang">
                                                            <option
                                                                {{\Illuminate\Support\Facades\Session::get('client_lang')?'':'selected'}} value="fr">
                                                                Français
                                                            </option>
                                                            <option
                                                                {{\Illuminate\Support\Facades\Session::get('client_lang')?'selected':''}} value="ar">
                                                                العربية
                                                            </option>
                                                        </select>
                                                        {{--                              <select name="speed" class="currency option-drop">--}}
                                                        {{--                                <option selected="selected">DZD</option>--}}
                                                        {{--                              </select>--}}
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="top-link right-side">
                                                    <div class="help-num"><a class="help-num"
                                                                             href="tel:{{$settings->where('name','contact tél 1')->first()->value??'#'}}">{{__("Besoin d'aide")}}
                                                            ? {{$settings->where('name','contact tél 1')->first()->value??'#'}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-lgmd-60per">
                <div class="bottom-inner">
                    <div class="position-r">
                        <div class="nav_sec position-r">
                            <div class="mobilemenu-title mobilemenu">
                                <span>{{__('Menu')}}</span>
                                <i class="fa fa-bars pull-right"></i>
                            </div>
                            <div class="mobilemenu-content">
                                <ul class="nav navbar-nav" id="menu-main">
                                    <li class="@if(Route::currentRouteName() == 'index') active @endif ">
                                        <a href="{{route('index')}}"><span>{{__('Accueil')}}</span></a>
                                    </li>
                                    <li class="@if(Route::currentRouteName() == 'vendors') active @endif ">
                                        <a href="{{route('vendors')}}"><span>{{__('Vendeurs')}}</span></a>
                                    </li>
                                    <li class="@if(Route::currentRouteName() == 'shop') active @endif ">
                                        <a href="{{route('shop')}}"><span>{{__('Boutique')}}</span></a>
                                    </li>
                                    <li class="@if(Route::currentRouteName() == 'about') active @endif ">
                                        <a href="{{route('about')}}"><span>{{__('A propos de nous')}}</span></a>
                                    </li>
                                    {{--           <li class="@if(Route::currentRouteName() == 'blog') active @endif ">
                                                <a href="{{route('blog')}}"><span>Comment utiliser le coupon</span></a>
                                              </li> --}}
                                    <li class="@if(Route::currentRouteName() == 'contact') active @endif ">
                                        <a href="{{route('contact')}}"><span>{{__('Nous contacter')}}</span></a>
                                    </li>
                                    {{--     <li class="level dropdown ">
                                          <span class="opener plus"></span>
                                          <a href="#" class="page-scroll"><span>Pages</span></a>
                                          <div class="megamenu mobile-sub-menu">
                                            <div class="megamenu-inner-top">
                                              <ul class="sub-menu-level1">
                                                <li class="level2">
                                                  <ul class="sub-menu-level2 ">
                                                    <li class="level3"><a href="{{route('client.account')}}"><span>■</span>Account</a></li>
                                                    <li class="level3"><a href="{{route('checkout')}}"><span>■</span>Checkout info</a></li>
                                                    <li class="level3"><a href="{{route('checkout.overview')}}"><span>■</span>Checkout overview</a></li>

                                                    <li class="level3"><a href="{{route('compare')}}"><span>■</span>Compare</a></li>
                                                    <li class="level3"><a href="{{route('blog')}}"><span>■</span>How to use coupon</a></li>
                                                    <li class="level3"><a href="{{route('order-tracking')}}"><span>■</span>order-tracking</a></li>

                                                    <li class="level3"><a href="{{route('client.login')}}"><span>■</span>Login</a></li>
                                                    <li class="level3"><a href="{{route('client.register')}}"><span>■</span>Register</a></li>
                                                    <li class="level3"><a href="{{route('client.forget-password')}}"><span>■</span>Forget password</a></li>
                                                    <li class="level3"><a href="{{route('client.reset-password')}}"><span>■</span>Reset password</a></li>
                                                    <li class="level3"><a href="{{route('shop')}}"><span>■</span>Shop</a></li>
                                                    <li class="level3"><a href="{{route('about')}}"><span>■</span>About</a></li>
                                                    <li class="level3"><a href="{{route('contact')}}"><span>■</span>Contact</a></li>
                                                    <li class="level3"><a href="{{route('cart')}}"><span>■</span>Cart</a></li>
                                                  </ul>
                                                </li>
                                              </ul>
                                            </div>
                                          </div>
                                        </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="right-side float-left-xs header-right-link">
                    <div class="right-side">
                        <div class="help-num"><a class="text-white"
                                                 href="tel:{{$settings->where('name','contact tél 1')->first()->value??'#'}}">{{__("Besoin d'aide?")}}
                                : {{$settings->where('name','contact tél 1')->first()->value??'#'}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
