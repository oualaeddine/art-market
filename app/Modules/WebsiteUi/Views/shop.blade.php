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

            var url = '{{ route("add-cart",":product") }}';

            url = url.replace(':product', $(this).data('id') );

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
    </script>

@endsection
