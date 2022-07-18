@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.select2')
    <style>
        .login_oueter {
            width: 360px;
            max-width: 100%;
        }
        .logo_outer{
            text-align: center;
        }
        .logo_outer img{
            width:120px;
            margin-bottom: 40px;
        }

        .input-group-text {
            display: block!important;
        }
    </style>
@endpush

@section('content')

    @include('partials.error.error')


    <div class="card">
        <form class="pt-0" action="{{route('admin.vendors.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h4>Utilisateur par default</h4>
            </div>
            <div class="card-body">


                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="mb-1">Email</label> <b class="text-danger">*</b>
                        <input
                            type="email"
                            value="{{old('email')}}"
                            class="form-control mt-1"
                            id="email"
                            name="email"
                            aria-label=""
                            required
                        />
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class=" mb-1">Télephone</label> <b class="text-danger">*</b>
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
{{--                    <div class="form-group col-sm-12 col-md-4">--}}
{{--                        <label class=" mb-1">État</label> <b class="text-danger">*</b>--}}
{{--                        <select required name="is_active" class="form-control" id="">--}}
{{--                            <option value="" selected disabled>Sélectionnez un état</option>--}}
{{--                            <option value="1">Actif</option>--}}
{{--                            <option value="0">Non actif</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                </div>

                <div class="row">

{{--                        <div class="input-group mb-3">--}}
{{--                            <div class="input-group-prepend">--}}
{{--                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>--}}
{{--                            </div>--}}
{{--                            <input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />--}}
{{--                            <div class="input-group-append">--}}
{{--                                <span class="input-group-text" onclick="password_show_hide();">--}}
{{--                                  <i class="fas fa-eye" id="show_eye"></i>--}}
{{--                                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    <div class="form-group col-sm-12 col-md-5">
                        <label class=" mb-1">Mot de passe</label> <b class="text-danger">*</b>
                        <div class="input-group">
                            <input type="password"
                                   class="form-control"
                                   id="password"
                                   name="password"
                                   placeholder=""
                                   aria-label=""
                                   required >

                            <span class="input-group-append" id="basic-addon3" onclick="password_show_hide();">
                                 <label class="input-group-text" >
                                      <i class="fas fa-eye" id="show_eye"></i>
                                      <i class="fas fa-eye-slash d-none" id="hide_eye" ></i>
                                 </label>

                            </span>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-5">
                        <label class=" mb-1">confirmation de mot de passe</label> <b class="text-danger">*</b>
                        <div class="input-group">
                            <input type="password"
                                   class="form-control"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   placeholder=""
                                   aria-label=""
                                   required >

                            <span class="input-group-append" id="basic-addon3" onclick="password_show_hide_confirmation();">
                                 <label class="input-group-text" >
                                      <i class="fas fa-eye" id="show_eye_confirmation"></i>
                                      <i class="fas fa-eye-slash d-none" id="hide_eye_confirmation" ></i>
                                 </label>

                            </span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 mt-4">
                        <button type="button" onclick="generatePassword()" class="btn btn-primary">Générer un mot de passe</button>
                    </div>

                </div>


            </div>
            <div class="card-header">
                <h4>Informations sur le vendeur</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="mb-1"> Nom en français</label> <b class="text-danger">*</b>
                        <input
                            type="text"
                            value="{{old('name_fr')}}"
                            class="form-control mt-1"
                            id="name_fr"
                            name="name_fr"
                            placeholder=""
                            aria-label=""
                            required
                        />
                    </div>
                    <div class="form-group col-sm-12 col-md-6 text-end">
                        <label class=" mb-1 "> <b class="text-danger">*</b>الاسم بالعربي</label>
                        <input
                            dir="rtl"
                            type="text"
                            class="form-control mt-1"
                            value="{{old('name_ar')}}"
                            id="name_ar"
                            name="name_ar"
                            placeholder=""
                            aria-label=""
                            required
                        />
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="mb-1">brève description</label> <b class="text-danger">*</b>
                        <textarea required class="form-control" name="short_dec_fr" id="" cols="30"
                                  rows="2">{{old('short_dec_fr')}}</textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 text-end">
                        <label class=" mb-1 "> <b class="text-danger">*</b>وصف قصير</label>
                        <textarea  dir="rtl" required class="form-control" name="short_dec_ar" id="" cols="30"
                                  rows="2">{{old('short_dec_ar')}}</textarea>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="mb-1">Logo</label> <b class="text-danger">*</b>
                        <input required type="file" name="logo_fr" class="form-control">
                    </div>


                </div>

            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-success btn-phone-send">Ajouter</button>

            </div>

        </form>


    </div>

    {{--
    </div> --}}

    @push('js')
        @include('layouts.extra.js.select2')

        <script>
            function makeid(length) {
                var result           = '';
                var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for ( var i = 0; i < length; i++ ) {
                    result += characters.charAt(Math.floor(Math.random() *
                        charactersLength));
                }
                return result;
            }

            function generatePassword(){
                var password=makeid(8).toLocaleUpperCase();
                $('#password').val(password)
                $('#password_confirmation').val(password)
            }
            function password_show_hide() {
                var x = document.getElementById("password");
                var show_eye = document.getElementById("show_eye");
                var hide_eye = document.getElementById("hide_eye");
                hide_eye.classList.remove("d-none");
                if (x.type === "password") {
                    x.type = "text";
                    show_eye.style.display = "none";
                    hide_eye.style.display = "inline-flex";
                } else {
                    x.type = "password";
                    show_eye.style.display = "inline-flex";
                    hide_eye.style.display = "none";
                }


            }

            function password_show_hide_confirmation() {
                var x = document.getElementById("password_confirmation");
                var show_eye = document.getElementById("show_eye_confirmation");
                var hide_eye = document.getElementById("hide_eye_confirmation");
                hide_eye.classList.remove("d-none");
                if (x.type === "password") {
                    x.type = "text";
                    show_eye.style.display = "none";
                    hide_eye.style.display = "inline-flex";
                } else {
                    x.type = "password";
                    show_eye.style.display = "inline-flex";
                    hide_eye.style.display = "none";
                }


            }
            $(document).ready(function () {
                $('.js-example-basic-single').select2({
                    placeholder: "Sélectionnez les rôles",
                    allowClear: true
                });

            });


        </script>
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

