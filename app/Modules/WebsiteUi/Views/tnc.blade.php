@extends('website.app')

@section('content')

    <div class="outer__inner">
        <div class="section faq py-15">
            <div class="container">
                <div class="row justify-content-center mb-lg-20">
                    <div class="col-md-8 col-12 text-center">
                        <div class="faq__stage">{{__("learn how to get started")}}</div>
                        <h1 class="faq__title h2">{{__("Terms & Conditions")}}</h1>
{{--                        <div class="faq__info">{{__("These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, Acticome accessible at")}} <a href="http://www.coodiv.net" target="_blank" rel="noopener noreferrer">www.coodiv.net</a></div>--}}
                    </div>
                </div>
                    {!! $terms->value !!}}
            </div>
        </div>
    </div>

@endsection
