@extends('website.app')

@section('content')



    <div class="outer__inner">

        <x-shop-page-hero />

        <x-catlago-section :products="$products" :sort-by="$sort_by"  />

    </div>

    <x-side-bar-filter
        :categories="$categories"
        :brands="$brands"
        :vendors="$vendors"
        :selected-category='"$selected_category"'
        :selected-brand='"$selected_brand"'
        :selected_vendor="$selected_vendor"
        :price="$price"

    />

@vite(['resources/js/shop.js'])



@endsection
