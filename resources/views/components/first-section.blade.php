<div>

    <div class="section-pb selection pt-1 pb-20">
        <div class="container">
            <div class="text-left">
                <div class="popular__stage">{{__("Discover unique")}}</div>
                <h3 class="hot__title h3">{{__("hand-picked items")}}</h3>
            </div>
            <div class="row justify-content-center">
                @foreach($tops as $top)
                    @if($loop->first)
                        <div class="col-md-4">
                            <a class="selection__card" href="item.html">
                                <div class="selection__preview"><img src="{{$top->image}}" alt="Selection" /></div>
                                <div class="selection__head">
                                    <div class="selection__line">
                                        <div class="selection__description">
                                            <div class="selection__title">{{$top->main_title}}</div>
                                            <div class="selection__counter">{{$top->sub_title}}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @else
                        <div class="col-md-4">
                            <a class="selection__card d-flex h-100" href="item.html">
                                <div class="selection__preview position-relative with-absolute-description">
                                    <img src="{{$top->image}}" alt="Selection" />
                                    <div class="selection__description absolute-home-description-item">
                                        <div class="selection__title">{{$top->main_title}}</div>
                                        <div class="selection__counter">{{$top->sub_title}}</div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endif
                @endforeach

            </div>

            <div class="row justify-content-center mt-12 mb-lg-0 mb-15">
                <div class="col-12 col-lg-8">
                    <div class="brand-logos d-flex justify-content-center align-items-center mx-n9 flex-wrap">
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="500" data-aos-once="true">
                            <img src="website/images/customers/logo-01.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="700" data-aos-once="true">
                            <img src="website/images/customers/logo-02.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="900" data-aos-once="true">
                            <img src="website/images/customers/logo-03.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="1100" data-aos-once="true">
                            <img src="website/images/customers/logo-04.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="1300" data-aos-once="true">
                            <img src="website/images/customers/logo-05.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="1500" data-aos-once="true">
                            <img src="website/images/customers/logo-06.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="1500" data-aos-once="true">
                            <img src="website/images/customers/logo-07.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="1500" data-aos-once="true">
                            <img src="website/images/customers/logo-08.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="1500" data-aos-once="true">
                            <img src="website/images/customers/logo-09.png" alt="#" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
