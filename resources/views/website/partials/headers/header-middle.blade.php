<div class="header-middle">
    <div class="container">
      <hr>
      <div class="row">
        <div class="col-xl-3 col-md-3 col-6 col-lgmd-20per order-md-1">
          <div class="header-middle-left">
            <div class="navbar-header float-none-sm">
              <a class="navbar-brand page-scroll" href="{{route('index')}}" style="padding: 0px 0;">
                <img alt="Stylexpo" src="/logo-viannet.png" class="logo-home">
                {{-- <img alt="Stylexpo" src="/website/assets/images/logo.png"> --}}

              </a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-3 col-6 col-lgmd-20per order-md-3 cart-header">
          <div class="right-side header-right-link">
            <ul>
{{--              <li class="compare-icon">--}}
{{--                <a href="{{route('compare')}}">--}}
{{--                  <span></span>--}}
{{--                </a>--}}
{{--              </li>--}}
          {{--     <li class="wishlist-icon">
                <a href="wishlist.html">
                  <span></span>
                </a>
              </li> --}}
              <li class="cart-icon">
                <a href="{{route('cart')}}"> <span>
                        <small class="cart-notification">{{Cart::count()}}</small>
                    </span>
                </a>
                <div class="cart-dropdown header-link-dropdown">
                  <div style="height: 245px;" data-simplebar data-simplebar-auto-hide="false">
                      @if($cart_items->isNotEmpty())
                    <ul class="cart-list link-dropdown-list">
                      @foreach ($cart_items as $item)

                        <li>
                          <a class="close-cart cart-remove-item" data-id="{{$item->id}}">
                            <i class="fa fa-times-circle"></i>
                          </a>
                          <div class="media">
                            <a class="pull-left">
                              @if ($item->options->image != null)
                                <img alt="Stylexpo" src="{{asset($item->options->image)}}" class="image-cart-special">
                              @else
                                <img alt="Stylexpo" src="/website/assets/images/product/product_1_sm.jpg">
                              @endif

                            </a>
                            <div class="media-body"> <span><a href="#">{{\Illuminate\Support\Facades\Session::get('client_lang')?$item->options['name_ar']:$item->name}}</a></span>
                              <p class="cart-price">{{number_format($item->price, 2, '.', ',')}} {{__("DA")}}</p>
                              <div class="product-qty">
                                <label>{{__('Quantité')}} :</label>
                                <div class="custom-qty">
                                  <input type="number" style="width: 50px" value="{{$item->qty}}" min="1" name="quantity_cart" class="qty-edit-cart form-control" data-id="{{$item->id}}">
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>

                      @endforeach
                    </ul>
                      @else
                          <div class="text-center ptb-60" style="padding-top: 30%">
                              <h3>Votre panier est vide visiter la <a href="{{route('shop')}}">boutique</a>
                              </h3>
                          </div>
                      @endif
                  </div>
                  <p class="cart-sub-totle">
                    <span class="pull-left">{{__('Sous-total')}}</span>
                    <span class="pull-right"><strong class="price-box">{{Cart::subtotal()}} {{__("DA")}}</strong></span>
                  </p>
                  <div class="clearfix"></div>
                  <div class="mt-20">
                    <a href="{{route('cart')}}" class="btn-color btn left-side">{{__('Panier')}}</a>
                    @if ($cart_items->count() != 0)
                       <a href="{{route('checkout')}}" class="btn-color btn right-side">{{__('Paiement')}}</a>
                    @endif

                  </div>
                </div>
              </li>
              <li class="side-toggle">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><i class="fa fa-bars"></i></button>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-6 col-md-6 col-12 col-lgmd-60per order-md-2">
          <div class="header-right-part">
            <form action="{{route('shop')}}" >
            <div class="category-dropdown select-dropdown">
              <fieldset>
                <select id="search-category" class="option-drop" name="c">
                  <option value="">{{__('Toutes les catégories')}}</option>
                   @foreach ($categories as $c)
                   <option value="{{$c->name_fr}}">{{\Illuminate\Support\Facades\Session::get('client_lang')?$c->name_ar:$c->name_fr}}</option>
                   @endforeach
                </select>
              </fieldset>
            </div>
            <div class="main-search">
              <div class="header_search_toggle desktop-view">

                  <div class="search-box">
                    <input class="input-text" value="{{$serach?? ''}}" type="text" name="search" placeholder="{{__('Parcourez la boutique entier ici')}}...">
                    <button type="submit" class="search-btn"></button>
                  </div>

              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
