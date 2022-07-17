@extends('website.app')

@section('content')

    <div class="outer__inner">


        <div class="section faq py-15">
            <div class="container">
                <div class="row justify-content-center mb-lg-20">
                    <div class="col-md-8 col-12 text-center">
                        <h1 class="faq__title h2">{{__("Frequently asked questions")}}</h1>
                        <div class="mobile-show">
                            <select class="select js-tabs-select">
                                <option>General</option>
                                <option>Our products</option>
                                <option>Shipping</option>
                                <option>Prices</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="faq__row ">
                    <div class="faq__col row justify-content-center">

                        <div class="faq__box rounded-20 box-shadow-2  col-md-8 col-12 shadow-lg" style="display: block;">

                            @foreach($faqs as $faq)
                                <div class="faq__item mt-6">
                                    <div class="faq__head">{{$faq->question}}</div>
                                    <div class="faq__body">
                                        <div class="faq__content">{{$faq->answer}}.</div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
