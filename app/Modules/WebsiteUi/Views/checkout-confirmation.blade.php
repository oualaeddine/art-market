@extends('website.app')

@section('content')

    <div class="outer__inner">
        <div class="cart__container pt-10 pb-25">
            <form action="{{route('store_info')}}" method="POST">
                @csrf
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-8 col-12 mb-5">
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

                                    <div class="cart__item">
                                        <div class="row justify-content-start w-100 align-items-center">
                                            <a href="{{route('product',[$item->options->slug])}}"
                                               class="cart__preview col-md-2"><img
                                                    src="{{asset($item->options->image??'/website/images/demo/product-0-8.jpeg')}}"
                                                    alt="item"/></a>


                                            <div class="col-md-4">
                                                <div
                                                    class="cart__subtitle">{{$item->{app()->getLocale()=='fr'?'name':'->options->name_ar'} }}</div>
                                                <div class="cart__description">{{__("From vendor")}} <a
                                                        href="{{route('vendor-detail',[$item->options->vendor_name_fr])}}">{{$item->options->{app()->getLocale()=='fr'?'vendor_name_fr':'vendor_name_ar'} }}</a>
                                                </div>
                                                <div class="header__date">{{$item->options->created_at->format('d-m-Y H:i')}}</div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="cart__prices">
                                                    <div class="the__price__discount"
                                                         style="text-decoration: none">{{number_format($item->price,2).trans('DA')}}</div>
                                                    {{--                <div class="the__price">$89.00</div>--}}
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="cart__prices">
                                                    <div class="the__price">{{$item->qty}}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="cart__prices">
                                                    <div
                                                        class="the__price">{{number_format($item->price*$item->qty,2).trans('DA')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{--                            </div>--}}

                            </div>
                        </div>

                        <div class="col-lg-4 col-12 pl-lg-0" style="">
                            <div class="sidebar__inner" style="position: relative;">
                                <div class="cart__filters js-activity-filters">
                                    <div class="cart__info">{{__("Cart total")}}</div>

                                    <div class="popup__table">
                                        <div class="popup__row">
                                            <div class="popup__col">{{__("Total price")}}</div>
                                            <div
                                                class="popup__col">{{\Gloudemans\Shoppingcart\Facades\Cart::total().trans('DA')}}</div>
                                        </div>
                                        <div class="popup__row">
                                            <div class="popup__col">{{__("Shipping")}} </div>
                                            <div class="popup__col">{{$shipping}}{{__("DA")}}</div>
                                        </div>
{{--                                        <div class="popup__row">--}}
{{--                                            <div class="popup__col">{{__("TVA fee")}}</div>--}}
{{--                                            <div class="popup__col">0.00 {{__("DA")}}</div>--}}
{{--                                        </div>--}}
                                        <div class="popup__row">
                                            <div class="popup__col">{{__("You will pay")}}</div>
                                            <div
                                                class="popup__col">{{$total.trans('DA')}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="cart__filters js-activity-filters mt-5">
                                    <div class="cart__info">{{__("Shipping details")}}</div>
                                    <div class="shippign__details__sidebar">
                                        <span class="shippign__details__sidebar__title">{{__("Receiver name")}}</span>
                                        <p class="shippign__details__sidebar__text">{{$info['full_name']}}</p>

                                        <span class="shippign__details__sidebar__title">{{__("Phone")}}</span>
                                        <p class="shippign__details__sidebar__text">{{$info['phone']}}</p>

                                        <span class="shippign__details__sidebar__title">{{__("Address")}}</span>
                                        <p class="shippign__details__sidebar__text">{{$info['address'].' - '.$info['wilaya'].' - '.$info['commune']}}</p>

                                        <a class="shippign__details__sidebar__link"
                                           href="{{route('checkout')}}">{{__("Edit Shipping details")}}</a>
                                    </div>
                                </div>
                                <div class="footer_btn w-100 px-3 mt-10">
                                    <button type="submit"
                                            class="button popup__button d-block w-100">{{__("CHECKOUT NOW")}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
