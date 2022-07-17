<div>
    <footer class="footer pt-15">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-3 col-12 text-lg-left text-center mb-lg-0 mb-10">
                    <a class="footer__logo" href="index.html"><img class="some-icon" src="/ArtMarket.png"
                                                                   alt="Crypter NFT"/><img class="some-icon-dark"
                                                                                           src="/website/images/logo-light.png"
                                                                                           alt="Crypter NFT"/></a>
                    <div class="footer__info"><i class="fad fa-map-marked-alt"></i> 17 rue de setif, algeria.</div>
                    <div class="footer__info__contact"><a href="#">support@coodiv.net</a> <a href="#">003135566332</a>
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
                        </ul>
                    </div>

                    <div class="col-4 text-lg-left text-center footer__links__group">
                        <h5 class="h5 font-weight-bold">{{__("ABOUT")}}</h5>
                        <ul class="footer__links__items">
                            <li><a href="{{route('about')}}">{{__("Our Story")}}</a></li>
                            <li><a href="{{route('contact')}}">{{__("Contact")}}</a></li>
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

                        <form class="subscription">
                            <input class="subscription__input" type="email" name="email"
                                   placeholder="{{__("Enter your phone number")}}" required="required"/>
                            <button class="subscription__btn">
                                <span class="icon icon-arrow-next"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer__foot">
                <div class="footer__copyright">© {{__("coodiv.net 2022. All rights reserved")}}.</div>
                <div class="footer__note">
                    <i class="fab fa-cc-amazon-pay"></i>
                    <i class="fab fa-cc-amex"></i>
                    <i class="fab fa-cc-discover"></i>
                    <i class="fab fa-cc-stripe"></i>
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-paypal"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fab fa-cc-apple-pay"></i>
                </div>
            </div>
        </div>
    </footer>
</div>
