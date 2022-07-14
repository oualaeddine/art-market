@extends('website.app')

@section('content')
    <style>
        .select .list{
            max-height: 20rem;
            overflow-y: scroll
        }

    </style>
    <div class="container ">
        <div class="row justify-content-center">
            <div class=" col-sm col-md-4">
                <div class="signin_page_coodiv my-10">
                    <div class="h4 mt-8 entry__title">{{__("Sign up")}}</div>
                    @include('partials.error.error')

                    <div class="field_signin_page">
                        <form action="{{route('client.register.action')}}" method="POST" id="register-form">
                            @csrf
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input required class="field__input" type="text" name="last_name"
                                           placeholder="{{__("Your last name")}}" id="last_name">
                                    <div class="field__icon">
                                        <i class="fal fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input required class="field__input" type="text" name="first_name"
                                           placeholder="{{__("Your first name")}}" id="first_name">
                                    <div class="field__icon">
                                        <i class="fal fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input required class="field__input form-control  phone-input" value="{{old('phone')}}"
                                           type="tel" name="phone" autocomplete="off"
                                           placeholder="{{__("Your phone")}}">
                                    <div class="field__icon">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input required class="field__input form-control "  value="{{old('email')}}"
                                           type="email" name="email" autocomplete="off"
                                           placeholder="{{__("Your email")}}">
                                    <div class="field__icon">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input required class="field__input" type="password" name="password" placeholder="{{__("Password")}}">
                                    <div class="field__icon">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input required class="field__input" type="password" name="password_confirmation" placeholder="{{__("Password confirmation")}}">
                                    <div class="field__icon">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <select required class="select" name="wilaya" id="wilaya_id" >
                                        <option value="" selected disabled>{{__('Your wilaya')}}</option>
                                            @foreach($wilayas as $wilaya)
                                            <option value="{{$wilaya->id}}">{{"( $wilaya->id ) ". $wilaya->{app()->getLocale()=='fr'?'name':'name_ar'} }}</option>
                                            @endforeach
                                    </select>
                                    <div class="field__icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <select required class="select"  id="commune_id" name="commune_id">
                                        <option value="" selected disabled>{{__('Your commune')}}</option>
                                    </select>
                                    <div class="field__icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                    class="button entry__button d-flex w-100 mt-10 btn-phone-send">{{__("Sign up")}}</button>
                        </form>
                    </div>
                    <div class="signin__page__info">Already have an account? <a
                            href="{{route('client.login')}}">{{__("Sign in")}}</a></div>

                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/wilaya.js'])

@endsection
