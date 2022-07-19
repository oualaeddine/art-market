@extends('website.app')

@section('content')


{{--    <div class="container">--}}
{{--        <div class="d-flex justify-content-between align-items-center" aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb">--}}
{{--                <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                <li class="breadcrumb-item"><a href="#">Women</a></li>--}}
{{--                <li class="breadcrumb-item"><a href="#">Clothings</a></li>--}}
{{--                <li class="breadcrumb-item"><a href="#">Blouses</a></li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page">Black Lace Sleeve Pleat Top</li>--}}
{{--            </ol>--}}
{{--            <div class="breadcrumb__arrows">--}}
{{--                <a class="breadcrumb__arrow__left" href="#">--}}
{{--                    <i class="fal fa-long-arrow-alt-left"></i>--}}
{{--                    <img src="/website/images/demo/product-0-12.jpeg" alt=""/>--}}
{{--                </a>--}}
{{--                <a class="breadcrumb__arrow__right" href="#">--}}
{{--                    <i class="fal fa-long-arrow-alt-right"></i>--}}
{{--                    <img src="/website/images/demo/product-0-11.jpeg" alt=""/>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="outer__inner">

        <x-product-detail :product="$product"/>

        <x-product-description :product="$product"/>

        <x-product-related :products="$realted_products"/>


        {{--    <div class="popup popup_bid mfp-hide" id="popup-bid">--}}
        {{--        <div class="popup__title h4">Place a bid</div>--}}
        {{--        <div class="popup__info">You are about to purchase <strong>Rust Embellished Satin Stripe Top</strong> from <strong>Nedjai Mohamed</strong></div>--}}
        {{--        <div class="popup__subtitle">Your bid</div>--}}
        {{--        <div class="popup__table">--}}
        {{--            <div class="popup__row">--}}
        {{--                <div class="popup__col">Enter bid</div>--}}
        {{--                <div class="popup__col">--}}
        {{--                    <div class="popup__bid">--}}
        {{--                        <input class="popup__rate" type="tel" name="bid">--}}
        {{--                        <div class="popup__currency">USD</div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="popup__row">--}}
        {{--            </div>--}}
        {{--            <div class="popup__row">--}}
        {{--                <div class="popup__col">Service fee</div>--}}
        {{--                <div class="popup__col">1.44 USD</div>--}}
        {{--            </div>--}}
        {{--            <div class="popup__row">--}}
        {{--                <div class="popup__col">Total bid amount</div>--}}
        {{--                <div class="popup__col">0 USD</div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="popup__btns"><a class="button popup__button js-popup-open" href="#popup-wallet" data-effect="mfp-zoom-in">Place a bid</a>--}}
        {{--            <button class="button-stroke popup__button js-popup-close">Cancel</button>--}}
        {{--        </div>--}}
        {{--    </div>--}}

        {{--    <div class="popup popup_wallet mfp-hide" id="popup-wallet">--}}

        {{--        <div class="success">--}}
        {{--            <i class="success__icon fad fa-badge-check"></i>--}}
        {{--            <div class="success__title h2">that's awesome!</div>--}}
        {{--            <div class="success__info">Your order in your cart</div>--}}
        {{--            <div class="success__table">--}}
        {{--                <div class="success__row">--}}
        {{--                    <div class="success__col">Status</div>--}}
        {{--                    <div class="success__col">order ID</div>--}}
        {{--                </div>--}}
        {{--                <div class="success__row">--}}
        {{--                    <div class="success__col">Waiting for payment</div>--}}
        {{--                    <div class="success__col">#156774</div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="popup__btns">--}}
        {{--            <button class="button-stroke d-block js-popup-close w-100">continue shopping</button>--}}
        {{--        </div>--}}


        {{--    </div>--}}

        {{--    <div class="popup popup_purchase mfp-hide" id="popup-purchase">--}}
        {{--        <div class="popup__item" style="display: block;">--}}
        {{--            <div class="popup__title h4">Order confirmation</div>--}}
        {{--            <div class="popup__info">You are about to purchase <strong>Rust Embellished Satin Stripe Top</strong> from <a href="#">ADIDAS</a> store</div>--}}
        {{--            <div class="popup__table">--}}
        {{--                <div class="popup__row">--}}
        {{--                    <div class="popup__col">Price</div>--}}
        {{--                    <div class="popup__col">$86.33</div>--}}
        {{--                </div>--}}
        {{--                <div class="popup__row">--}}
        {{--                    <div class="popup__col">6 months installment</div>--}}
        {{--                    <div class="popup__col">+22%</div>--}}
        {{--                </div>--}}
        {{--                <div class="popup__row">--}}
        {{--                    <div class="popup__col">installment fee</div>--}}
        {{--                    <div class="popup__col">$12.34</div>--}}
        {{--                </div>--}}
        {{--                <div class="popup__row">--}}
        {{--                    <div class="popup__col">Shipping (yalidine)</div>--}}
        {{--                    <div class="popup__col">$4.99</div>--}}
        {{--                </div>--}}
        {{--                <div class="popup__row">--}}
        {{--                    <div class="popup__col">TVA fee</div>--}}
        {{--                    <div class="popup__col">$2.99</div>--}}
        {{--                </div>--}}
        {{--                <div class="popup__row">--}}
        {{--                    <div class="popup__col">You will pay</div>--}}
        {{--                    <div class="popup__col">$164.33</div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="popup__btns">--}}
        {{--                <button class="button popup__button">I understand, continue</button>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        {{--        <div class="popup__item">--}}
        {{--            <div class="popup__item__waiting">--}}
        {{--                <div class="steps__icon"><div class="loader-circle"></div></div>--}}
        {{--            </div>--}}
        {{--            <div class="success">--}}
        {{--                <i class="success__icon fad fa-badge-check"></i>--}}
        {{--                <div class="success__title h2">that's awesome!</div>--}}
        {{--                <div class="success__info">Your order in your cart</div>--}}
        {{--                <div class="success__table">--}}
        {{--                    <div class="success__row">--}}
        {{--                        <div class="success__col">Status</div>--}}
        {{--                        <div class="success__col">order ID</div>--}}
        {{--                    </div>--}}
        {{--                    <div class="success__row">--}}
        {{--                        <div class="success__col">Waiting for payment</div>--}}
        {{--                        <div class="success__col">#156774</div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="popup__btns">--}}
        {{--                <button class="button-stroke d-block js-popup-close w-100">continue shopping</button>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--    </div>--}}
    </div>
@endsection
