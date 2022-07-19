@extends('website.app')

@section('content')
    <div class="outer__inner">
        <div class="cart__container pt-10 pb-25">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-lg-8 col-12">
                        <div class="cart__list">
                            <div class="cart__list_header">
                                <div class="row justify-content-start w-100 mb-3">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <h6>{{__("PRODUCT")}}</h6>
                                    </div>

                                    <div class="col-md-2">
                                        <h6 class="text-center">{{__("PRICE")}}</h6>
                                    </div>

                                    <div class="col-md-2">
                                        <h6 class="text-center">{{__("QUANTITY")}}</h6>
                                    </div>

                                    <div class="col-md-2">
                                        <h6 class="text-center">{{__("SUBTOTAL")}}</h6>
                                    </div>
                                </div>
                            </div>

{{--                            <div style="max-height: 37rem;overflow-y: scroll">--}}
                                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                                    <x-cart-item :item="$item" />

                                @endforeach
{{--                            </div>--}}

                        </div>
                    </div>

                    <div class="col-lg-4 col-12 mt-lg-0 mt-10">
                        <div class="cart__filters js-activity-filters">
                            <div class="cart__info">{{__("Cart total")}}</div>

                            <div class="popup__table">
                                <div class="popup__row">
                                    <div class="popup__col">{{__("Total price")}}</div>
                                    <div class="popup__col">{{\Gloudemans\Shoppingcart\Facades\Cart::total().trans('DA')}}</div>
                                </div>
                                <div class="popup__row">
                                    <div class="popup__col">{{__("Shipping")}}</div>
                                    <div class="popup__col">{{number_format(\Gloudemans\Shoppingcart\Facades\Cart::content()->sum('options.shipping'),2)}}{{__("DA")}}</div>
                                </div>
{{--                                <div class="popup__row">--}}
{{--                                    <div class="popup__col">{{__("TVA fee")}}</div>--}}
{{--                                    <div class="popup__col">0.00 DA</div>--}}
{{--                                </div>--}}
                                <div class="popup__row">
                                    <div class="popup__col">{{__("You will pay")}}</div>
                                    <div class="popup__col">{{\Gloudemans\Shoppingcart\Facades\Cart::total().trans('DA')}}</div>
                                </div>
                            </div>

                            <div class="popup__btns">
                                <a href="{{route('checkout')}}" class="button popup__button">{{__("PROCEED TO CHECKOUT")}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
