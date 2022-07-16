@extends('website.app')

@section('content')

    <div class="outer__inner">
        <div class="cart__container pt-10 pb-25">
            <div class="container">
                <div class="row justify-content-center">
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

                            <div style="max-height: 24rem;overflow-y: scroll">
                            @foreach($orders as $order)
                                @foreach($order->products as $item)

                                    <div class="cart__item">
                                        <div class="row justify-content-start w-100 align-items-center">
                                            <a href="{{route('product',[$item->instance->slug])}}"
                                               class="cart__preview col-md-2"><img
                                                    src="/website/images/demo/product-0-8.jpeg" alt="item"/></a>

                                            <div class="col-md-4">
                                                <div
                                                    class="cart__subtitle">{{$item->instance->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</div>
                                                <div class="cart__description">{{__("From")}} <a
                                                        href="#">{{$order->vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</a> {{__("store")}}
                                                </div>
                                                <div class="header__date">{{$item->created_at}}</div>
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
                            @endforeach
                            </div>

                        </div>
                        <div class="row float-md-right mt-2">
                            <div class="sidebar__inner" style="position: relative;">
                                <div class="cart__filters js-activity-filters">
                                    <div class="popup__table">
                                        <div class="popup__row">
                                            <div class="popup__col">{{__("Total price")}}</div>
                                            <div
                                                class="popup__col">{{number_format($orders->sum('total'),2).trans('DA')}}</div>
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
                                                class="popup__col">{{number_format($orders->sum('total'),2).trans('DA')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="success">
                            <i class="success__icon fad fa-badge-check"></i>
                            <div class="success__title h2">{{__("That's awesome!")}}</div>
                            <div class="success__info">{{__("thank you for ordering, we've received your order")}} <a
                                    href="javascript:void(0)">#{{$order->tracking_code}}</a></div>
                            <div class="success__table">
                                <div class="success__row">
                                    <div class="success__col">{{__("Status")}}</div>
                                    <div class="success__col">order ID</div>
                                </div>
                                <div class="success__row">
                                    <div class="success__col">{{__("Waiting for confirmation")}}</div>
                                    <div class="success__col">{{$order->tracking_code}}</div>
                                </div>
                            </div>
                        </div>

                        <a href="{{route('shop')}}"
                           class="btn button-stroke d-block w-100">{{__("continue shopping")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
