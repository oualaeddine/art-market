<div class="popup-links" style="z-index: 99999">
    <div class="popup-links-inner">
      <ul>
        <li class="categories">
          <a class="popup-with-form" href="#categories_popup" data-toggle="modal"><span class="icon"></span><span class="icon-text">{{__('Catégories')}}</span></a>
        </li>
        <li class="cart-icon">
          <a class="popup-with-form" href="#cart_popup" data-toggle="modal"><span class="icon"></span><span class="icon-text">{{__('Panier')}}</span></a>
        </li>
        @if (Auth::guard('client')->user())

          <li class="account">
            <a class="popup-with-form" href="#account_popup" data-toggle="modal"><span class="icon"></span><span class="icon-text">{{__('Compte')}}</span></a>
          </li>

        @endif

        <li class="search">
          <a class="popup-with-form" href="#search_popup" data-toggle="modal"><span class="icon"></span><span class="icon-text">{{__('Recherche')}}</span></a>
        </li>
        <li class="scroll scrollup">
          <a href="#"><span class="icon"></span><span class="icon-text">{{__('Haut')}}</span></a>
        </li>
      </ul>
    </div>
  </div>
