@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.select2')
    <style>
        .error{
            color: red;
        }
    </style>
@endpush

@section('content')

    @include('partials.error.error')


    <div class="card">
        <form name="update_vendor_user" class="add-new-record modal-content pt-0"  action="{{route('vendor.user.profile.update')}}"
              method="POST">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h4 class="modal-title">Modifier mon profile</h4>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6">
                            <label class="mb-1">Email</label>
                            <input
                                type="email"
                                value="{{$vendor->email}}"
                                class="form-control mt-1"
                                id="email_user_edit"
                                name="email"
                                aria-label=""
                                required
                            />
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label class=" mb-1">Télephone</label>
                            <input
                                type="tel"
                                value="{{'0'.$vendor->phone}}"
                                class="form-control mt-1 phone-input"
                                id="phone_user_edit"
                                name="phone"
                                placeholder=""
                                aria-label=""
                                required
                            />
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label class=" mb-1">Mot de pass</label>
                            <input
                                type="password"
                                id="password"
                                class="form-control mt-1"
                                name="password"
                                placeholder=""
                                aria-label=""

                            />
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label class=" mb-1">Confirmation mot de pass</label>
                            <input
                                type="password"
                                class="form-control mt-1"
                                name="password_confirmation"
                                placeholder=""
                                aria-label=""

                            />
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary waves-effect waves-light btn-phone-send ">Modifier</button>
            </div>
        </form>

    </div>


    @push('js')
        @include('layouts.extra.js.select2')



        <script>


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
