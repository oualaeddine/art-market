<div class="popup_containt" >
    <div class="modal fade" id="categories_popup" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="popup-title">
              <h2 class="main_title heading m-0"><span>{{__('Catégories')}}</span></h2>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pl-4">
            <div style="height: 100%;" data-simplebar data-simplebar-auto-hide="false">
              <div class="popup-detail">
                <ul class="cate-inner">

                  @foreach ($categories as $c)
                    <li class="level">
                      <a href="{{route('shop',['c'=> $c->name_fr])}}" class="page-scroll"><i class="fa fa-camera-retro"></i>
                          @if(\Illuminate\Support\Facades\Session::get('client_lang'))
                          {{$c->name_ar}}
                          @else
                              {{$c->name_fr}}
                          @endif
                          {{'('. $c->products->count().')'}}</a>
                    </li>
                  @endforeach

                  <li class="level"><a href="{{route('shop')}}" class="page-scroll"><i class="fa fa-plus-square"></i>{{__('Plus de catégories')}}</a></li>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="cart_popup" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="popup-title">
              <h2 class="main_title heading m-0"><span>{{__('Panier')}}</span></h2>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pl-4 modal-cart">
            <div class="popup-detail">
              <div class="cart-dropdown ">
                <div style="height: 300px;" data-simplebar data-simplebar-auto-hide="false">
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
                            <img style="object-fit: cover" alt="Stylexpo" src="{{asset($item->options->image)}}" class="image-cart-popup">
                          @else
                            <img  style="object-fit: cover" alt="Stylexpo" src="/website/assets/images/product/product_1_sm.jpg">
                          @endif

                        </a>
                        <div class="media-body"> <span><a href="#">{{\Illuminate\Support\Facades\Session::get('client_lang')?$item->options->name_ar:$item->name}}</a></span>
                          <p class="cart-price"> {{number_format($item->price, 2, '.', ',')}} {{__("DA")}}</p>
                          <div class="product-qty">
                            <label>{{__('Quantité')}} :</label>
                            <div class="custom-qty">

                              <input type="number" style="width: 50px" value="{{$item->qty}}" min="1" name="quantity_cart" class="qty-edit-cart form-control" data-id="{{$item->id}}">

                              {{-- <input type="text" name="qty" maxlength="8" value="{{$item->qty}}" title="Qty" class="input-text qty"> --}}
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
                  <span class="pull-right"><strong class="price-box">{{Cart::subtotal()}} DA</strong></span>
                </p>
                <div class="clearfix"></div>
                <div class="mt-20">
                  <a href="{{route('cart')}}" class="btn-color btn left-side">{{__('Panier')}}</a>
                   @if ($cart_items->count() != 0)
                      <a href="{{route('checkout')}}" class="btn-color btn right-side">{{__('Paiement')}}</a>
                   @endif

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="account_popup" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="popup-title">
              <h2 class="main_title heading m-0"><span>{{__('Compte')}}</span></h2>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body p-4">
            <div class="popup-detail pr-0">
              <div class="row">
                <div class="col-lg-4">
                  <a href="{{route('client.account')}}">
                    <div class="account-inner mb-30">
                      <i class="fa fa-user"></i><br/>
                      <span>{{__('Compte')}}</span>
                    </div>
                  </a>
                </div>
                @if (! Auth::guard('client')->user())
                  <div class="col-lg-4">
                    <a href="{{route('client.register')}}">
                      <div class="account-inner mb-30">
                        <i class="fa fa-user-plus"></i><br/>
                        <span>{{__("S'inscrire")}}</span>
                      </div>
                    </a>
                  </div>
                @endif
                <div class="col-lg-4">
                  <a href="{{route('cart')}}">
                    <div class="account-inner mb-30">
                      <i class="fa fa-shopping-bag"></i><br/>
                      <span>{{__("Panier")}}</span>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4">
                  <a href="{{route('client.account','#step5')}}">
                    <div class="account-inner">
                      <i class="fa fa-key"></i><br/>
                      <span>{{__("Changer le mot de passe")}}</span>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4">
                  <a href="{{route('client.account','#step3')}}">
                    <div class="account-inner">
                      <i class="fa fa-history"></i><br/>
                      <span>{{__("Historique")}}</span>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4">
                  <form action="{{route('client.logout.action')}}" id="logout-form" method="POST"> @csrf </form>
                  <a>
                    <div class="account-inner logout">
                      <i class="fa fa-share-square-o"></i><br/>
                      <span>{{__("Se déconnecter")}}</span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="search_popup" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="popup-title">
              <h2 class="main_title heading m-0"><span>{{__("Recherche")}}</span></h2>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body p-4">
            <div class="popup-detail pr-0">
              <div class="main-search">
                <div class="header_search_toggle desktop-view">
                  <form action="{{route('shop')}}">
                    <div class="search-box">
                      <input class="input-text" value="{{$serach?? ''}}" type="text" name="search" placeholder="{{__('Cherchez dans tout le magasin ici')}}...">
                      <button class="search-btn"></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
