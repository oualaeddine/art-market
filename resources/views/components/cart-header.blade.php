<div class="header__item header__item_cart js-header-item" >
    <button class="header__head js-header-head active">
        <i class="fal fa-shopping-bag"></i>
        <span class="cart-notification">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span>
    </button>
    <div class="header__body js-header-body" id="cart-in-header">
        <div class="js-header-header d-flex justify-content-between align-items-center w-100">
            <div class="header__title h5">{{__("Your cart")}}</div>
            <span class="header__title__total__price badge badge-pill badge-warning">{{__("Total")}}: {{\Gloudemans\Shoppingcart\Facades\Cart::total().trans('DA')}}</span>
        </div>

        <div class="header__list" style="max-height: 23rem;overflow-y: scroll;">
            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                <x-cart-header-item :item="$item" />
            @endforeach

        </div>
        <div class="js-header-footer">
            <a class="btn__outline__animation mr-4" href="{{route('cart')}}">{{__("Cart")}}</a>
            <a class="btn__outline__animation" href="{{route('checkout')}}">{{__("Checkout now")}}</a>
        </div>
    </div>

</div>
