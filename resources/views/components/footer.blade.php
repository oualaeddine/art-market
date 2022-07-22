<div class="d-print-none">
    <footer class="footer pt-15">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-3 col-12 text-lg-left text-center mb-lg-0 mb-10">
                    <a class="footer__logo" href="{{route('index')}}"><img class="some-icon" src="/ArtMarket.png"
                                                                   alt="Crypter NFT"/><img class="some-icon-dark"
                                                                                           src="/website/images/logo-light.png"
                                                                                           alt="Crypter NFT"/></a>
                    <div class="footer__info"><i class="fad fa-map-marked-alt"></i> <a  target="_blank" href="https://www.google.dz/maps/place/Taksit+Acm/@36.7301167,3.0002255,17z/data=!3m1!4b1!4m5!3m4!1s0x128faf6216149b53:0xc7e16007deee2961!8m2!3d36.7301167!4d3.0024142">{{$settings->where('name',app()->getLocale()=='fr'?'adresse_fr':'adresse_ar')->first()->value??'#'}}</a>.</div>
                    <div class="footer__info__contact">
                        <a href="mailto:{{ $settings->where('name', 'email')->first()->value ?? '' }}">{{ $settings->where('name', 'email')->first()->value ?? '' }}</a>
                        <a href="tel:{{ $settings->where('name', 'contact tél 1')->first()->value ?? '#' }}">{{ $settings->where('name', 'contact tél 1')->first()->value ?? '#' }}</a>
                        <a href="tel:{{ $settings->where('name', 'contact tél 2')->first()->value ?? '#' }}">{{ $settings->where('name', 'contact tél 2')->first()->value ?? '#' }}</a>
                    </div>
                </div>
                <div class="col-md-6 col-12 row justify-content-start mb-lg-0 mb-10">
                    <div class="col-4 text-lg-left text-center footer__links__group">
                        <h5 class="h5 font-weight-bold">{{__("SHOP")}}</h5>
                        <ul class="footer__links__items">
                            <li><a href="{{route('shop')}}">{{__("Shop")}}</a></li>
                            <li><a href="{{route('vendors')}}">{{__("Vendors")}}</a></li>
{{--                            <li><a href="#">Collections</a></li>--}}
{{--                            <li><a href="#">Lookbook</a></li>--}}
{{--                            <li><a href="#">Women</a></li>--}}
{{--                            <li><a href="#">Men</a></li>--}}
{{--                            <li><a href="#">Kids</a></li>--}}
                        </ul>
                    </div>

                    <div class="col-4 text-lg-left text-center footer__links__group">
                        <h5 class="h5 font-weight-bold">{{__("HELP")}}</h5>
                        <ul class="footer__links__items">
                            <li><a href="{{route('faq')}}">{{__("FAQ")}}</a></li>
                            <li><a href="{{route('privacy')}}">{{__("Privacy Policy")}}</a></li>
                            <li><a href="{{route('terms_conditions')}}">{{__("Terms & Conditions")}}</a></li>
                            <li><a href="{{route('order-tracking')}}">{{__("Order Tracking")}}</a></li>
                        </ul>
                    </div>

                    <div class="col-4 text-lg-left text-center footer__links__group">
                        <h5 class="h5 font-weight-bold">{{__("ABOUT")}}</h5>
                        <ul class="footer__links__items">
                            <li><a href="{{route('about')}}">{{__("Our Story")}}</a></li>
                            <li><a href="{{route('contact')}}">{{__("Contact us")}}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-12 text-lg-left text-center">
                    <div class="subscription__contanier__footer">
                        <div class="subscription__contanier__footer__header mb-10">
                            <h5 class="h5 title">
                                <b>{{__("Need Help !")}}</b>
                                {{--                                <br />--}}
                                {{--                                {{__("Let us help you")}}--}}
                            </h5>
                            <p class="sub-title">{{__("Enter your phone number and we will call  to help you")}}.</p>
                        </div>

                        <form class="subscription" action="{{route('help-phone')}}" method="POST">
                            @csrf
                            <input class="subscription__input form-control phone-input" type="text" name="phone"
                                   placeholder="{{__("Enter your phone number")}}" required="required"/>
                            <button type="submit" class="subscription__btn phone-s  btn-phone-send">
                                <span class="icon icon-arrow-next"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
             <div class="footer__foot">
{{--                                 <div class="footer__copyright">© {{__("coodiv.net 2022. All rights reserved")}}.</div>--}}
                 <div >
                     <p>{{__("Follow us at")}}</p>

                     <a target="_blank"  class="text-black-50" style="font-size: 25px;" href="{{$settings->where('name','facebook')->first()->value??'#'}}"><i class="fab fa-facebook"></i></a>
                     <a target="_blank" class="text-black-50" style="font-size: 25px;"  href="{{$settings->where('name','instagram')->first()->value??'#'}}"><i class="fab fa-instagram"></i></a>
                 </div>
            </div>
        </div>
    </footer>
</div>
