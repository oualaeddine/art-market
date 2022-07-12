@extends('website.layouts.master')


@section('content')
    <!-- CONTAIN START ptb-95-->
    <section class="pt-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="map">
                        <div class="map-part">
                            <div id="map" class="map-inner-part"></div>
                        </div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3197.6853794302656!2d3.000225515287904!3d36.730116679962975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128faf6216149b53%3A0xc7e16007deee2961!2sTaksit%20Acm!5e0!3m2!1sen!2sdz!4v1648663055980!5m2!1sen!2sdz"
                            style="border:0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-70 client-main align-center">
        <div class="container">
            <div class="contact-info">
                <div class="row m-0">
                    <div class="col-md-4 p-0">
                        <div class="contact-box">
                            <div class="contact-icon contact-phone-icon"></div>
                            <span><b>{{ __('Téléphone') }}</b></span>
                            <p>{{ $setting->where('name', 'contact tél 1')->first()->value ?? '' }}
{{--                                /--}}
{{--                                {{ $setting->where('name', 'contact tél 2')->first()->value ?? '' }}--}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <div class="contact-box">
                            <div class="contact-icon contact-mail-icon"></div>
                            <span><b>{{ __('Email') }}</b></span>
                            <p>{{ $setting->where('name', 'email')->first()->value ?? '' }} </p>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <div class="contact-box">
                            <div class="contact-icon contact-open-icon"></div>
                            <span><b>{{ __('Ouverture') }}</b></span>
                            <p>{{__("Lun – Sam : 9h00 – 18h00")}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-part mb-30">
                        <h2 class="main_title  heading"><span>{{ __('Laissez un message!') }}</span></h2>
                    </div>
                </div>
            </div>
            <div class="main-form">
                <form action="{{ route('help-phone') }}" method="POST" name="contactform">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-30">
                            <input type="text" value="{{old('name')}}" required placeholder="{{ __('Nom') }}" name="name">
                        </div>
                        <div class="col-md-6 mb-30">
                            <input type="tel" value="{{old('phone')}}" class="phone-input" required placeholder="{{ __('Téléphone') }}" name="phone"
                               >
                        </div>
                        <div class="col-12 mb-30">
                            <textarea required placeholder="{{ __('Message') }}" rows="3" cols="30"
                                name="message">{{old('message')}}</textarea>
                        </div>
                        <div class="col-12">
                            <div class="align-center">
                                <button type="submit" name="submit" class="btn btn-color btn-phone-send">{{ __('Envoyer') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- CONTAINER END -->
@endsection
