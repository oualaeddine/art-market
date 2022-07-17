@extends('website.app')

@section('content')
    <div class="outer__inner">


        <div class="about__us__container pt-20 pb-25">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <div class="popular__stage"><h5 class="hot__title h3 mb-2">{{__("About Us")}}</h5></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="about__us__container__img container py-lg-0 py-15 px-lg-0 px-10 mb-10">
            <div class="row justify-content-center">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="about__us__text pl-lg-10">
                        {!! $about->value !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
