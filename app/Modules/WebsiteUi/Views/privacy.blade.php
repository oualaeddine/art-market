@extends('website.app')

@section('content')

    <div class="outer__inner">
        <div class="section faq py-15">
            <div class="container">
                <div class="row justify-content-start mb-lg-10">
                    <div class="col-md-8 col-12 text-left">
                        <div class="faq__stage">{{__("Know Your Rights")}}</div>
                        <h1 class="faq__title h2">{{__("Privacy Policy")}}</h1>
                    </div>
                </div>
                    {!! $terms->value !!}
            </div>
        </div>
    </div>

@endsection
