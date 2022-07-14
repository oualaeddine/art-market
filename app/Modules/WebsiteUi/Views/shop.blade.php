@extends('website.app')

@section('content')



    <div class="outer__inner">

{{--        <x-shop-page-hero />--}}

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

    <script>
        $('.add-to-cart').click(function(){

            var url = $(this).data('id')+'/add-to-cart';


            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                /* data : { value : false }, */
                url: url,
                error:function(data){
                    toastr.error(data.message);
                },
                success:function(data){
                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.success(data.message);
                    $('.cart-notification').text(data.data.count);
                    // i will change it later to make it auto generate without html call
                    $.when(  $.get('/', function(response) { //append data
                        $html_modal = $(response).find("#cart-in-header").html();
                        /* $div.append($html); */
                    }) ).done(function() {

                        $('#cart-in-header').empty();
                        $('#cart-in-header').append($html_modal);

                    });
                }
            });




        });
        function DeleteCartItem(id){

            var url = id+'/delete-item-cart';

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                /*  data : { value : false }, */
                url: url,
                error:function(data){
                    toastr.error(data.message);
                },
                success:function (data){
                    $('.cart-notification').text(data.count);
                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.success(data.message);
                    $.when(  $.get('/', function(response) { //append data
                        $html_modal = $(response).find("#cart-in-header").html();
                        /* $div.append($html); */
                    }) ).done(function() {

                        $('#cart-in-header').empty();
                        $('#cart-in-header').append($html_modal);

                    });
                }
            });


        }
    </script>

@endsection
