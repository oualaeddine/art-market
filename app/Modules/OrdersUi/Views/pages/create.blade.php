@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.select2')

@endpush


@section('content')

    @include('partials.error.error')
    @include('OrdersUi::prototype.product')

    <div class="card">
        <form action="{{route('admin.orders.store',['vendor'=>$id])}}" method="POST">
            @csrf
        <div class="card-block table-border-style table-responsive">
                @csrf
                <div class="row mb-4">

                    <div class="col-lg-4 col-md-6">
                        <label class="mb-1">Client</label> <b class="text-danger">*</b>
                        <select name="client_id" id="client_id" class="form-control" required>

                        </select>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <label class="form-control-label">Nom Complet</label> <b class="text-danger">*</b>
                        <input type="text" name="name" id="name" required class="form-control">
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <label class="form-control-label">Numéro de téléphone</label> <b class="text-danger">*</b>
                        <input type="tel" name="phone" required id="phone" class="form-control phone-input">
                    </div>

                </div>

                <div class="row mt-4 mb-4">

                    <div class="col-lg-3 col-md-6">
                        <label class="form-control-label">Wilaya</label>
                        <select class="form-select form-control"  name="wilaya_id" id="wilaya_id">
                            <option value="" disabled="" selected>Sélectionner un wilaya</option>

                            @foreach ($wilayas as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label class="form-control-label">Commune</label>
                        <select class="form-select form-control"  name="commune_id" id="commune_id">
                            <option value="" disabled="" selected>Sélectionner un commune</option>

                        </select>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label class="form-control-label">Adresse</label>
                        <select class="form-select form-control" name="address_id" id="address_id">
                            <option value="" disabled="" selected>Sélectionner un adresse</option>

                        </select>
                    </div>


                    <div class="col-lg-3 col-md-6">
                        <label class="form-control-label">Adresse</label>
                        <input type="tel" name="address"  id="address" class="form-control">
                    </div>

                </div>

                <div id="product"></div>

        </div>
            <div class="card-footer text-end">

                <button type="button" class="btn btn-inverse" id="add-product">Ajouter un produit</button>

                <button type="submit" class="btn waves-effect waves-light btn-success btn-phone-send">Ajouter</button>




            </div>
        </form>
    </div>


    @push('js')
        @include('layouts.extra.js.select2')

        <script>

            $(document).ready(function () {
                setTimeout(function (){
                    $('#add-product').click()
                },100)

                $('#add-product').on('click',function(){
                    $('#product-prototype .product').clone().appendTo('#product');
                    var url= '{{route('admin.orders.get.products',"vendor_id=")}}';
                    url =url.replace('vendor_id=', '{{'vendor_id='.$id}}');
                    $('#product .produit-id').select2({
                        placeholder: "écrire...",
                        theme: 'bootstrap4',
                        delay: 200,
                        minimumInputLength: 4,
                        ajax: {
                            url: url,
                            dataType: 'json',
                            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                        }
                    });

                })

                $('#product').on('click', '.delete-product', function() {
                    $(this).closest('.product').remove();
                })

                $('#wilaya_id').on('change',function(){

                    $('#commune_id').val('');

                    get_commune($(this).val())

                })

                // $('#address_id').on('change',function(){
                //
                //     $('#address').val($("#address_id option:selected").text())
                //
                // })


                $('#client_id').select2({
                    placeholder: "écrire...",
                    theme: 'bootstrap4',
                    delay: 200,
                    minimumInputLength: 4,
                    ajax: {
                        url: '{{route('admin.orders.get.clients')}}',
                        dataType: 'json',
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },
                    }
                });


                $('#client_id').on('change',function(){

                        var id = $(this).val();

                        var url_update = '{{ route("admin.clients.get.info",":id") }}';

                        url_update = url_update.replace(':id', id);

                        $.ajax({
                            url: url_update,
                            type: 'GET', dataType: 'json',
                            headers: {
                                'X-CSRF-Token': '{{ csrf_token() }}',
                            },

                            error: function (error) {
                                toastr.error("Something went wrong , try again please !");
                            },
                            success: function (data) {
                                var data = data;

                                $('#name').val(data.client.first_name +' '+ data.client.last_name)
                                $('#phone').val(0+data.client.phone)
                               /*  $('#wilaya_id').val(data.client.wilaya) */
                               /*  $('#commune_id').val(''); */

                                /* get_commune(data.client.wilaya_id) */

                               /*  $('#commune_id').val(data.client.commune_id); */

                                $.each(data.client_address, function (index, value) {

                                    $("#address_id").append(new Option(value.address,value.id));

                                });

                            }
                        });



                })

                $('body').on('change','.product-select',function(){

                    $(this).parent().parent().find('.price-input').val($(this).find('option:selected').attr('data-price'))

                })




            });

            function get_commune(id){

                 var id = id;

                    var url_coumne = '{{ route("admin.clients.get.commune",":id") }}';

                    url_coumne = url_coumne.replace(':id', id);

                    $('#commune_id').select2({
                            /* placeholder: "Start typing ...", */
                            theme: 'bootstrap4',
                            ajax: {
                                url: url_coumne,
                                dataType: 'json',
                                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                                processResults: function(data) {
                                    return {
                                        results: data
                                    };
                                },

                            }
                    });

            }
            const PhoneRegEx = /^0\d{9}$/g;
            const PhoneRegEx2 = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
            const PhoneRegEx3 = /^\d{9}$/g;
            const PhoneRegEx4 = /^[0-9]{1,2}?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;


            $('.phone-input').on('input',function(){
                var phone=$(this).val();
                $(this).removeClass('border-danger')

                if($(this).val().length >= 9 && $(this).val().length <= 14 ){

                    if (
                        ($(this).val().match(PhoneRegEx) ||
                            $(this).val().match(PhoneRegEx2)||
                            $(this).val().match(PhoneRegEx3) ||
                            $(this).val().match(PhoneRegEx4))

                        && (
                            phone.startsWith('00213') && phone.length===14 ||
                            phone.startsWith('0213') && phone.length===13 ||
                            phone.startsWith('213') && phone.length===12 ||
                            phone.startsWith('+213') && phone.length===13 ||
                            (phone.startsWith('5') || phone.startsWith('6') || phone.startsWith('7')) && phone.length===9 ||
                            phone.startsWith('0')  && phone.length===10
                        )

                    ) {

                        $('.btn-phone-send').attr('disabled',false)
                        $(this).addClass('border-success')
                        $(this).removeClass('border-danger')
                        $('.invalid-phone').hide()

                    }else{

                        $('.btn-phone-send').attr('disabled',true)
                        $(this).removeClass('border-success')
                        $(this).addClass('border-danger')
                        $('.invalid-phone').show()

                    }
                }else{
                    $('.btn-phone-send').attr('disabled',true)
                    $(this).removeClass('border-success')
                    $(this).addClass('border-danger')
                    $('.invalid-phone').show()
                }
            })


        </script>

    @endpush

@endsection
