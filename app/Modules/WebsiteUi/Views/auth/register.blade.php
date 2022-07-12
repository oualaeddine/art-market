@extends('website.layouts.master')

@push('css')

    @include('layouts.extra.css.select2')

@endpush

@section('content')


    <section class="checkout-section ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-8 ">
                            <form class="main-form full" method="POST" action="{{route('client.register.action')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-20">
                                        <div class="heading-part heading-bg text-center">
                                            <h2 class="heading">{{__('Inscription')}}</h2>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="input-box">
                                            <label for="login-email">{{__('Prénom')}}</label>
                                            <input name="first_name" value="{{old('first_name')}}" type="text" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="input-box">
                                            <label for="login-email">{{__('Nom')}}</label>
                                            <input name="last_name" value="{{old('last_name')}}" type="text" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="input-box">
                                            <label for="register_phone">{{__('Numéro de téléphone')}}</label>
                                            <input id="register_phone" class="phone-input" value="{{old('phone')}}" name="phone" type="tel" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="input-box">
                                            <label for="register_email">{{__('Email')}}</label>
                                            <input id="register_email" value="{{old('email')}}" name="email" type="email" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="input-box">
                                            <label for="login-email">{{__('Wilaya')}}</label>
                                            <select id="wilaya_id" required name="wilaya" class="form-control">
                                                <option value="" disabled="true" selected>{{__('Sélectionner la wilaya')}}
                                                </option>
                                                @foreach($wilayas as $wilaya)
                                                    <option
                                                        value="{{$wilaya->id}}" @if(\Illuminate\Support\Facades\Session::get('wilaya') === $wilaya->id)  selected @endif>{{((\Illuminate\Support\Facades\Session::get('client_lang')?$wilaya->name_ar:$wilaya->name)??$wilaya->name) ." ($wilaya->id)"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="input-box">
                                            <label for="login-email">{{__('Commune')}}</label>
                                            <select id="commune_id" required name="commune_id" class="form-control">
                                                @if(\Illuminate\Support\Facades\Session::get('commune'))
                                                    <option value="{{\Illuminate\Support\Facades\Session::get('commune')['id']}}" selected>{{\Illuminate\Support\Facades\Session::get('commune')['name']}}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="input-box">
                                            <label for="login-pass">{{__('Mot de passe')}}</label>
                                            <input id="login-pass" name="password" type="password" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="input-box">
                                            <label for="login-pass">{{__('Confirmation de mot de passe')}}</label>
                                            <input id="login-pass" type="password" name="password_confirmation"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        {{--  <div class="check-box left-side">
                                           <span>
                                             <input type="checkbox" name="remember_me" id="remember_me" class="checkbox">
                                             <label for="remember_me">Se souvenir de moi</label>
                                           </span>
                                         </div> --}}
                                        <button name="submit" type="submit" class="btn-color right-side btn-phone-send">{{__("S'inscrire")}}
                                        </button>
                                    </div>
                                    <div class="col-12"><a title="Forgot Password" class="forgot-password mtb-20"
                                                           href="{{route('client.forget-password')}}">{{__('Mot de passe oublié ?')}} </a>
                                        <hr>
                                    </div>
                                    <div class="col-12">
                                        <div class="new-account align-center mt-20"><span>{{__('Vous avez un compte ?')}} </span>
                                            <a class="link" title="login with" href="{{route('client.login')}}">{{__('Se connecter')}}</a></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    @push('js')
        @include('layouts.extra.js.select2')

        <script>
            $(document).ready(function () {
                $('#wilaya_id').on('change', function () {
                    var id = $(this).val();
                    $('#commune_id').val(null).trigger('change');
                    var url_coumne = '{{ route("get.commune",":id") }}';

                    console.log(id);
                    url_coumne = url_coumne.replace(':id', id);

                    $('#commune_id').select2({
                        /* placeholder: "Start typing ...", */
                        // theme: 'bootstrap4',
                        ajax: {
                            url: url_coumne,
                            dataType: 'json',
                            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },

                        }
                    });

                });
            });
        </script>
    @endpush

    <style>
        .select2-container--default .select2-selection--single {
            background-color: rgb(255 255 255);
            border: 1px solid rgb(170 170 170);
            border-radius: 4px;
            height: 40px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: rgb(68 68 68);
            line-height: 38px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 7px;
            right: 1px;
            width: 20px;
        }
    </style>
@endsection
