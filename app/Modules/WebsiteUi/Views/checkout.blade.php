@extends('website.app')

@section('content')

    @include('partials.error.error')
    <div class="outer__inner">
        <div class="cart__container pt-10 pb-25">
            <form action="{{route('checkout.confirmation')}}">
                <div class="container">
                    <div class="container-sidebar row justify-content-start">
                        <div class="col-lg-8 col-12">

                            <div class="billing__form">
                                <div class="billing__list">
                                    <div class="billing__item">
                                        <div class="d-lg-flex justify-content-between align-items-center">
                                            <div class="billing__category">{{__("Your personal informations")}} </div>
                                            @guest('client')
                                                <a class="button description__button mt-lg-0 mt-3"
                                                   href="{{route('client.login')}}">{{__("Do you have an account?")}}</a>

                                            @endguest
                                        </div>
                                        <div class="billing__fieldset">
                                            <div class="row justify-content-start">
                                                <div class="col-md-6">
                                                    <div class="field field field__style__one">
                                                        <div class="field__label">{{__("Last name")}}</div>
                                                        <div class="field__wrap">
                                                            <input class="field__input" type="text" name="last_name" {{auth()->guard('client')->check()?'readonly':''}}
                                                                   value="{{auth()->guard('client')->check()?auth()->guard('client')->user()->last_name:''}}"
                                                                   placeholder="{{__("Last name")}}" required=""/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="field field__style__one">
                                                        <div class="field__label">{{__("First name")}}</div>
                                                        <div class="field__wrap">
                                                            <input class="field__input" type="text" name="first_name" {{auth()->guard('client')->check()?'readonly':''}}
                                                                   value="{{auth()->guard('client')->check()?auth()->guard('client')->user()->first_name:''}}"
                                                                   placeholder="{{__("First name")}}" required=""/>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="row justify-content-start">
                                                <div class="col-md-7">
                                                    <div class="field field field__style__one">
                                                        <div class="field__label">{{__("Phone number")}}</div>
                                                        <div class="field__wrap">
                                                            <input class="field__input phone-input" type="tel" {{auth()->guard('client')->check()?'readonly':''}}
                                                                   value="{{auth()->guard('client')->check()?('0'.auth()->guard('client')->user()->phone):''}}"
                                                                   name="phone" placeholder="{{__("Phone number")}}" required=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @auth('client')
                                    <div class="billing__list">
                                        <div class="billing__item">
                                            <div class="billing__category">{{__("Shipping informations")}}</div>
                                            <div class="billing__fieldset">
                                                <div class="row justify-content-start">
                                                    <div class="col-md-10">
                                                        <div class="field field field__style__one select__field">
                                                            <div class="field__label">{{__("Address")}}</div>
                                                            <div class="field__wrap">
                                                                <select class="select" name="address" required tabindex="-1">
                                                                    <option value="" selected
                                                                            disabled>{{__("Select your address")}}</option>
                                                                    @foreach(auth()->guard('client')->user()->addresses as $address)
                                                                        <option
                                                                            value="{{$address->id}}">{{$address->address}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">

                                                        <a class="js-popup-open" data-effect="mfp-zoom-in" tabindex="0"
                                                           href="#popup-new-adress"><i class="fal fa-plus-circle"></i>
                                                            {{__("ADD ADDRESS")}}</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endauth

                                @guest('client')
                                    <div class="billing__list">
                                        <div class="billing__item">
                                            <div class="billing__category">{{__("Shipping informations")}}</div>
                                            <div class="billing__fieldset">
                                                <div class="row justify-content-start">
                                                    <div class="col-md-5">
                                                        <div class="field field field__style__one select__field">
                                                            <div class="field__label">{{__("Wilaya")}}</div>
                                                            <div class="field__wrap">
                                                                <input class="field__input" type="text" name="wilaya"
                                                                       placeholder="{{__("Wilaya")}}" required=""/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5">
                                                        <div class="field field__style__one select__field">
                                                            <div class="field__label">{{__("Commune")}}</div>
                                                            <div class="field__wrap">
                                                                <input class="field__input" type="text" name="commune"
                                                                       placeholder="{{__("Commune")}}" required=""/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-start">
                                                    <div class="col-md-12">
                                                        <div class="field field__style__one">
                                                            <div class="field__label">{{__("Your address")}}</div>
                                                            <div class="field__wrap">
                                                                <input class="field__input" type="text" name="address"
                                                                       placeholder="{{__("Address")}}" required=""/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endguest
                            </div>

                        </div>

                        <div id="sticky-sidebar" class="col-lg-4 col-12 mt-lg-0 mt-10 pl-lg-0">
                            <div class="cart__filters js-activity-filters sidebar__inner">
                                <div class="cart__info">Cart total</div>

                                <div class="popup__table">
                                    <div class="popup__row">
                                        <div class="popup__col">{{__("Total price")}}</div>
                                        <div
                                            class="popup__col">{{\Gloudemans\Shoppingcart\Facades\Cart::total().trans('DA')}}</div>
                                    </div>
                                    <div class="popup__row">
                                        <div class="popup__col">{{__("Shipping")}} (yalidine)</div>
                                        <div class="popup__col">0.00 DA</div>
                                    </div>
                                    <div class="popup__row">
                                        <div class="popup__col">{{__("TVA fee")}}</div>
                                        <div class="popup__col">0.00 DA</div>
                                    </div>
                                    <div class="popup__row">
                                        <div class="popup__col">{{_("You will pay")}}</div>
                                        <div
                                            class="popup__col">{{\Gloudemans\Shoppingcart\Facades\Cart::total().trans('DA')}}</div>
                                    </div>
                                </div>

                                <div class="popup__btns">
                                    <button type="submit" class="button popup__button btn-phone-send">{{__("PROCEED TO CHECKOUT")}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-create-address-modal :wilayas="$wilayas"/>
    @vite(['resources/js/wilaya.js'])
@endsection
