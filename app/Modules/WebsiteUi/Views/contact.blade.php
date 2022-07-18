@extends('website.app')

@section('content')

    <div class="outer__inner">
        <div class="contact__us__container pt-20 pb-25">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <div class="popular__stage">{{__("Do you want to get touch with our team?")}}</div>
                        <h3 class="hot__title h3 mb-0">{{__("Let's do this")}}</h3>
                    </div>
                </div>

                <div class="contact__us__section__group row justify-content-center mt-15">
                    <div class="col-md-3 contact__us__section">
                        <i class="fal fa-headset"></i>
                        <h5>{{__("Customer Service")}}</h5>
                        <span>{{__("Sunday – Thursday 8 – 17")}}</span>
                        <span><b>{{__("Phone")}}:</b> <a href=""{{ $setting->where('name', 'contact tél 1')->first()->value ?? '#' }}></a></span>
                        <span><b>{{__("Phone")}}:</b> <a href=""{{ $setting->where('name', 'contact tél 2')->first()->value ?? '#' }}></a></span>

                    </div>

                    <div class="col-md-3 contact__us__section">
                        <i class="fal fa-mailbox"></i>
                        <h5>{{__("Email Contact")}}</h5>
                        <span><b>{{__("Email")}}:</b> <a href="#">{{ $setting->where('name', 'email')->first()->value ?? '' }}</a></span>
                    </div>

                    <div class="col-md-3 contact__us__section">
                        <i class="fal fa-location-arrow"></i>
                        <h5>{{__("Address")}}</h5>
                        <span class="mb-7">{{__("Coodiv team Ltd")}}.</span>
                        <span>{{$setting->where('name',app()->getLocale()=='fr'?'adresse_fr':'adresse_ar')->first()->value??'#'}}</span>
                    </div>
                </div>

                <div class="row justify-content-center mt-20">
                    <div class="col-md-8 text-center">
                        <div class="popular__stage">{{__("Do you want to get touch with our team?")}}</div>
                        <h3 class="hot__title h3 mb-6">{{__("Can We Help?")}}</h3>
                        <p class="contact__us__section__group__text">
                            {{__("Our team was handpicked for their understanding of materials, process and passion for fashion. Whether you are browsing our site or visiting our store, we are always willing to share our deep knowledge and understanding of our makers and their craft")}}.
                        </p>
                        <p class="contact__us__section__group__text">
                            {{__("The most commonly asked questions are covered in Our")}} <a href="{{route('faq')}}">{{__("FAQ")}}</a>.
                        </p>
                    </div>
                </div>

                <div class="row justify-content-center mt-10">
                    <div class="col-md-8">
                        <form action="{{route('help-phone')}}" method="POST">
                            @csrf
                            <div class="field field__style__one mb-8">
                                <div class="field__label">{{__("Full name")}}</div>
                                <div class="field__wrap">
                                    <input class="field__input" type="text" name="name" value="{{old('name')}}" placeholder="{{__("Full name")}}" required="" />
                                </div>
                            </div>

                            <div class="field field__style__one mb-8">
                                <div class="field__label">{{__("Your phone")}}</div>
                                <div class="field__wrap">
                                    <input class="field__input form-control phone-input" value="{{old('phone')}}" type="tel" name="phone" placeholder="{{__("Your phone")}}" required="" />
                                </div>
                            </div>

                            <div class="field field__style__one mb-8">
                                <div class="field__label">{{__("Your Message")}}</div>
                                <div class="field__wrap">
                                    <textarea required class="field__text__area" name="messsage" rows="5" cols="50">{{old('message')}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="button popup__button btn-phone-send">{{__("SEND MESSAGE")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
