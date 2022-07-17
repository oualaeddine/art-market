@extends('website.app')

@section('content')
    <div class="row justify-content-center">

        <div class="signin_wrapper_coodiv col-md-8 col-lg-4 col-11" style="min-height: 70vh">
            <div class="signin_page_coodiv w-100 my-10">
                <div class="h4 mt-8 entry__title">{{__("Forgot Password")}}</div>
                <form action="{{route('client.forget-password.action')}}"method="POST">
                    @csrf
                    <div class="field_signin_page">
                        @include('partials.error.error')
                        <div class="field field_icon mb-3">
                            <div class="field__wrap">
                                <input required class="field__input" type="email" name="email" placeholder="{{__("Your email")}}">
                                <div class="field__icon">
                                    <i class="fal fa-envelope"></i>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="button entry__button d-flex w-100 mt-10" href="#">{{__("Send code to my email")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
