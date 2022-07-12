@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')


    <div class="card">
        <div class="card-header">
            <h5>Ajouter un client</h5>
        </div>

        <form class="pt-0" action="{{route('admin.clients.store')}}" method="POST" id="clients-form" enctype="multipart/form-data">
                @csrf
        <div class="card-block">


            <div class="row">
                <div class="form-group col-sm-12 col-md-4">
                    <label class="mb-1">Nom</label> <b class="text-danger">*</b>
                    <input
                        type="text"
                        value="{{old('last_name')}}"
                        class="form-control mt-1 "
                        id="last_name"
                        name="last_name"
                        placeholder="Nom"
                        aria-label=""
                        required
                    />
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label class=" mb-1">Prènom</label> <b class="text-danger">*</b>
                    <input
                        type="text"
                        class="form-control mt-1"
                        value="{{old('first_name')}}"
                        id="first_name"
                        name="first_name"
                        placeholder="Prénom"
                        aria-label=""
                        required
                    />
                </div>

                <div class="form-group col-sm-12 col-md-4">
                    <label class="mb-1">Téléphone</label> <b class="text-danger">*</b>

                    <input
                        type="tel"
                        class="form-control mt-1 phone-input"
                        value="{{old('phone')}}"
                        id="phone"
                        name="phone"
                        placeholder=""
                        aria-label=""
                        required
                    />
                </div>


            </div>

            <div class="row">
                <div class="form-group col-sm-12 col-md-4">
                    <label class=" mb-1">Email</label> <b class="text-danger">*</b>
                    <input
                        type="email"
                        value="{{old('email')}}"
                        class="form-control mt-1"
                        id="email"
                        name="email"
                        placeholder="email@gmail.com"
                        aria-label=""
                        required
                    />
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label class=" mb-1">Mot de pass</label> <b class="text-danger">*</b>
                    <input
                        type="password"
                        class="form-control mt-1"
                        id="password"
                        name="password"
                        placeholder="Mot de passe"
                        aria-label=""
                        required
                    />
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label class=" mb-1">Confirmation mot de pass</label> <b class="text-danger">*</b>
                    <input
                        type="password"
                        class="form-control mt-1"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="********"
                        aria-label=""
                        required
                    />
                </div>
            </div>


            <div class="row">
                <div class="form-group col-sm-12 col-md-4">
                    <label class="mb-1">Wilaya</label> <b class="text-danger">*</b>
                    <select name="wilaya_id" id="wilaya_id" class="form-control" required>
                        <option value="" disabled="true" selected>Sélectionnez la wilaya</option>

                         @foreach ($wilayas as $wilaya)
                         <option value="{{$wilaya->id}}">{{$wilaya->id .' - '. $wilaya->name}}</option>
                         @endforeach

                    </select>

                </div>

                <div class="form-group col-sm-12 col-md-4">
                    <label class="mb-1">Commune</label> <b class="text-danger">*</b>
                    <select name="commune_id" id="commune_id" class="form-control" required>
                        <option value="" disabled="true" selected>Sélectionnez la commune</option>
                    </select>
                </div>


{{--                <div class="form-group col-sm-12 col-md-4 ">--}}
{{--                    <label class="mb-1">Photo de profil</label>--}}
{{--                    <input type="file" name="avatar" id="image" class="form-control">--}}
{{--                </div>--}}

            </div>





{{--            <div class="client-plus-info" style="display: none">--}}

{{--                <div class="card-header mb-2">--}}
{{--                    <h5>Adresses</h5>--}}
{{--                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>--}}
{{--                </div>--}}

{{--                <div id="address"></div>--}}
{{--                <button type="button" id="add-address" class="btn waves-effect waves-light btn-primary btn-outline-primary mt-2" style="width: 30%">--}}
{{--                        <i class="fa fa-plus"></i>Ajouter une adresse--}}
{{--                </button>--}}


{{--            </div>--}}

        </div>

        <div class="card-footer text-end">
            <button type="submit" class="btn btn-success btn-phone-send">Ajouter</button>

        </div>

        </form>

         @include('ClientsUi::pages.main.prototype.address')

    </div>

    {{--
    </div> --}}

    @push('js')
        @include('layouts.extra.js.select2')

        <script>

            $(document).ready(function () {

                // Add new address action
                $('#add-address').click(function () {

                    $('#address-prototype .address').clone().appendTo('#address');

                    $('#address .commune_address_id').select2({
                            /* placeholder: "Start typing ...", */
                            theme: 'bootstrap4',
                    });

                });

                // delete contact action
                $('#address').on('click','.delete-address',function(){
                    $(this).closest('.address').remove();
                });



                $('.btn-client-info').on('click',function(){
                    $('.client-plus-info').show()/* .find('.set-req').attr('required',true); */
              /*       $('.client-plus-info').find('select').attr('required',true); */
                    $(this).hide();
                    $('.btn-hide-client-info').show();
                })

                $('.btn-hide-client-info').on('click',function(){
                    $('.client-plus-info').hide()/* .find('.set-req').attr('required', false); */
               /*      $('.client-plus-info').find('select').attr('required',false); */
                    $(this).hide();
                    $('#info-supp').empty();
                    $('#secteur').empty();
                    $('#contact').empty();
                    $('.btn-client-info').show();
                })


                $('#wilaya_id').on('change',function(){


                    $('#commune_id').val('');

                    var id = $(this).val();

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


                })


                $('body').on('change', '.wilaya_del_id',function(){

                    $(this).parent().next().find('.commune_del_id').val('');

                    var id = $(this).val();

                    var url_coumne = '{{ route("admin.clients.get.commune",":id") }}';

                    url_coumne = url_coumne.replace(':id', id);


                    $(this).parent().next().find('.commune_del_id').select2({
                            /* placeholder: "Sélectionnez la commune", */
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

                })


                {{--$('body').on('change', '.secteur_id',function(){--}}

                {{--    $(this).parent().next().find('.comapnies_del_id').val('');--}}

                {{--    var id = $(this).val();--}}

                {{--    --}}{{--var url_coumne = '{{ route("admin.companies.get.secteur.company",":id") }}';--}}

                {{--    url_coumne = url_coumne.replace(':id', id);--}}


                {{--    $(this).parent().next().find('.comapnies_del_id').select2({--}}
                {{--            /* placeholder: "Start typing ...", */--}}
                {{--            theme: 'bootstrap4',--}}
                {{--            ajax: {--}}
                {{--                url: url_coumne,--}}
                {{--                dataType: 'json',--}}
                {{--                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example--}}
                {{--                processResults: function(data) {--}}
                {{--                    return {--}}
                {{--                        results: data--}}
                {{--                    };--}}
                {{--                },--}}

                {{--            }--}}
                {{--    });--}}

                {{--})--}}

            });
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

