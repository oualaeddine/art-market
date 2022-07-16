
{{--We are using direct libs and not vite cuz all instnace of require in files must be turned to import and since there some .min.js we cant change them--}}

{{--<script src="website/js/vendor.min.js"></script>--}}

<script src="{{asset('website/js/lib/slick.min.js')}}"></script>
<script src="{{asset('website/js/lib/fancybox.js')}}"></script>
<script src="{{asset('website/js/lib/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('website/js/lib/nouislider.min.js')}}"></script>
<script src="{{asset('website/js/lib/wNumb.js')}}"></script>
<script src="{{asset('website/js/lib/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('website/js/lib/jquery.countdown.min.js')}}"></script>

<script src="{{asset('website/js/app.js')}}"></script>
<script>
    $('.add-to-cart').click(function(){

        var url = '/'+$(this).data('id')+'/add-to-cart';


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

        var url = '/'+id+'/delete-item-cart';

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
                location.reload();
                // $.when(  $.get('/', function(response) { //append data
                //     $html_modal = $(response).find("#cart-in-header").html();
                //     /* $div.append($html); */
                // }) ).done(function() {
                //
                //     $('#cart-in-header').empty();
                //     $('#cart-in-header').append($html_modal);
                //
                // });
            }
        });


    }

    $('body').on('change','.quantity-input',function(){

        var url = '{{ route("update-item-cart",":product") }}';

        url = url.replace(':product', $(this).data('id') );

        var qty = $(this).val();
        console.log(qty)
        if(Math.floor(qty) !== Number(qty) || qty === null|| qty === ''){
            $(this).addClass('border border-danger');
            $(this).removeClass('border border-success');
        }
        else{
            $(this).removeClass('border border-danger');
            $(this).addClass('border border-success');

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data : { qty : $(this).val() },
                url: url,
                error:function(data){
                    toastr.error(data.message);
                },
                success:function (data){
                    toastr.success(data.message);

                    location.reload();
                }
            });



        }
    });
</script>
{{--<script src="{{asset('website/js/cart.js')}}"></script>--}}

{{--    @vite([--}}
{{--        'resources/js/jquery.min.js',--}}
{{--        'resources/js/app.js',--}}
{{--        'resources/js/card-js.min.js',--}}
{{--        'resources/js/fancybox.js',--}}
{{--        'resources/js/jquery.countdown.min.js',--}}
{{--        'resources/js/jquery.magnific-popup.min.js',--}}
{{--        'resources/js/jquery.nice-select.min.js',--}}
{{--        'resources/js/nouislider.min.js',--}}
{{--        'resources/js/share-buttons.js',--}}
{{--        'resources/js/slick.min.js',--}}
{{--        'resources/js/sticky-sidebar.min.js',--}}
{{--        'resources/js/wNumb.js',--}}
{{--        'resources/js/custom.js',--}}
{{--        'resources/js/vendor.min.js',--}}
{{--    ])--}}
