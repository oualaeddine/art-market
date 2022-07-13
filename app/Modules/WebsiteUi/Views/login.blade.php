@extends('website.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-sm col-md-4">
                <div class="signin_page_coodiv my-10">
                    <div class="h4 mt-8 entry__title">{{__("Sign in")}}</div>
                    <div class="alert alert-success text-center shadow-sm" role="alert">
                        {{__("Happy to see you again 🥳")}}
                    </div>
                    @include('partials.error.error')

                    <div class="field_signin_page">
                        <form action="{{route('client.login.action')}}" method="POST">
                            @csrf
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input class="field__input form-control  phone-input" value="{{old('phone')}}" type="tel" name="phone" autocomplete="off"
                                           placeholder="{{__("Your phone")}}">
                                    <div class="field__icon">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon">
                                <div class="field__wrap">
                                    <input class="field__input" type="password" name="password" placeholder="Password">
                                    <div class="field__icon">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                    class="button entry__button d-flex w-100 mt-10 btn-phone-send">{{__("Sign in")}}</button>
                        </form>
                    </div>
                    <div class="signin__page__info">Don’t have an account? <a
                            href="{{route('client.register')}}">{{__("Sign up")}}</a></div>

                </div>
            </div>
        </div>
    </div>
@endsection
