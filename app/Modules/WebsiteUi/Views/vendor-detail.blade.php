@extends('website.app')

@section('content')

    <div class="outer__inner">

        <div class="profile">
            <div class="profile__head js-profile-head" style="background-image: url('{{asset($vendor->images->where('name','banner')->first()->{app()->getLocale()=='fr'?'img_fr':'img_ar'}??'https://toka.b-cdn.net/wp-content/uploads/2022/04/frfrghj.png') }}');">
            </div>

            <div class="user header__user d-flex justify-content-between align-items-center">
                <div class="user__header d-flex align-items-center mb-8">
                    <div class="user__avatar"><img style="width: 85px;height: 85px;" src="{{asset($vendor->logo_fr??'client.png')}}" alt="Avatar"></div>
                    <div class="user__avatar__informations" >
                        <div class="user__name">{{$vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</div>
                        <div class="shop__info">{{$vendor->{app()->getLocale()=='fr'?'short_dec_fr':'short_dec_ar'} }}</div>
                        <div class="shop__selles">
                            <a href="#">{{$vendor->sales_count}} {{__("Sales")}}</a>
                        </div>
                    </div>
                </div>

                <div class="user__header_right d-flex ">
                    <a class="user__header__contact__btn" href="#">
                        <i class="fad fa-at"></i>
                        <span> {{$vendor->vendors->first()->phone}}</span>
                    </a>

                </div>
            </div>

            <x-catlago-section :products="$products" :sort-by="$sort_by"  />

        </div>

    </div>

    <x-vendor-side-bar-filter
        :categories="$categories"
        :brands="$brands"
        :selected-category='"$selected_category"'
        :selected-brand='"$selected_brand"'
        :price="$price"
    />

    @vite(['resources/js/shop.js'])

@endsection
