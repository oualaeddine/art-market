<div class="section item pt-1 pb-15">
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-6 position-relative">
                <div class="item__preview__big__image position-relative">
                    <div class="item__preview">
                        <div class="item__categories">
                            <div class="status-black item__category">art</div>
                            <div class="status-purple item__category">unlockable</div>
                        </div>

                        <div id="mainCarousel" class="item__preview__slider__items_group">
                            <div class="carousel__slide item__preview__slider__item"
                                 data-src="{{asset($product->image??'https://toka.b-cdn.net/wp-content/uploads/2022/04/vrgvg.png')}}" data-fancybox="gallery">
                                <img src="{{asset($product->image??'https://toka.b-cdn.net/wp-content/uploads/2022/04/vrgvg.png')}}"/>
                            </div>
                          @foreach($product->images as $image)
                                <div class="carousel__slide item__preview__slider__item"
                                     data-src="{{asset($image->image??'https://toka.b-cdn.net/wp-content/uploads/2022/04/vrgvg.png')}}" data-fancybox="gallery">
                                    <img src="{{asset($image->image??'https://toka.b-cdn.net/wp-content/uploads/2022/04/vrgvg.png')}}"/>
                                </div>
                          @endforeach
                        </div>


                        <div id="thumbCarousel" class="mini__item__preview_buttom">

                            <div class="carousel__slide">
                                <img class="panzoom__content" src="{{asset($product->image??'https://toka.b-cdn.net/wp-content/uploads/2022/04/vrgvg.png')}}"/>
                            </div>
                            @foreach($product->images as $image)
                                <div class="carousel__slide">
                                    <img class="panzoom__content" src="{{asset($image->image??'https://toka.b-cdn.net/wp-content/uploads/2022/04/vrgvg.png')}}"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
{{--                    <div class="options">--}}
{{--                        <div class="options__list">--}}
{{--                            <button class="card__favorite">--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>

            <div class="col-md-6">
                <div class="item__details item__page">
                    <h1 class="item__title h3">{{$product->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }} <a class="item__title__user" href="#">{{__("by")}}
                        {{$product->vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</a></h1>
{{--                    <div class="item__cost">--}}
{{--                        <div class="item__counter">10 in stock</div>--}}
{{--                        <div class="product__rating">--}}
{{--                            <div class="star__rating" role="img" aria-label="Rated 5.00 out of 5"></div>--}}
{{--                            <a href="#reviews" class="review__link" rel="nofollow"><span class="count">1</span> customer--}}
{{--                                review</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="item__text">
                        {{$product->{app()->getLocale()=='fr'?'desc_fr':'desc_ar'} }}
                    </div>

                    <div class="item__price align-items-center d-flex justify-content-start mb-10">
                        <div class="the__price__discount" style="text-decoration: none">{{number_format($product->price,2).' '.trans('DA')}}</div>
{{--                        <div class="the__price">$89.00 <small>When you pay in one payment</small></div>--}}
                    </div>
                    <div class="item__tabs js-tabs">
                        <div class="item__nav">
                            <a class="item__link js-tabs-link active" href="#"><i class="fal fa-info-circle"></i>
                                {{__("Product Information")}}</a>
{{--                            <a class="item__link js-tabs-link" href="#"><i class="fal fa-shipping-fast"></i> bid history</a>--}}
                        </div>

                        <div class="item__container">
                            <div class="item__box js-tabs-item" style="display: block;">
                                <ul class="item__tabs__informations">
                                    <li><b>{{__("Ref")}} : </b> {{$product->ref}}</li>
                                    <li><b>{{__("Category")}} : </b> {{$product->categories->first()->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</li>
                                </ul>
{{--                                <div--}}
{{--                                    class="item__radio__color__checkbox btn-group d-flex mb-10 px-5 mt-5 align-items-center"--}}
{{--                                    data-toggle="buttons">--}}
{{--                                    <h6 class="item__radio__color__checkbox__title">disponible Colors:</h6>--}}
{{--                                    <label style="background: #8bc34a;" class="item__radio__checkbox btn active">--}}
{{--                                        <input type="radio" name="options" id="option1" autocomplete="off" chacked/>--}}
{{--                                    </label>--}}

{{--                                    <label style="background: #9c27b0;" class="item__radio__checkbox btn">--}}
{{--                                        <input type="radio" name="options" id="option2" autocomplete="off"/>--}}
{{--                                    </label>--}}

{{--                                    <label style="background: #ff5722;" class="item__radio__checkbox btn">--}}
{{--                                        <input type="radio" name="options" id="option3" autocomplete="off"/>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
                            </div>


{{--                            <div class="item__box js-tabs-item">--}}
{{--                                <div class="item__users">--}}
{{--                                    <div class="item__user">--}}
{{--                                        <div class="item__description">--}}
{{--                                            <div class="item__action">Highest bid: <span>$573.77</span></div>--}}
{{--                                            <div class="item__name">Nedjai Mohamed</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="item__time">Jun 14 - 4:12 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item__user">--}}
{{--                                        <div class="item__description">--}}
{{--                                            <div class="item__action">#2 <span>$67.77</span></div>--}}
{{--                                            <div class="item__name">Nedjai Mohamed</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="item__time">Jun 14 - 4:12 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="item__user">--}}
{{--                                        <div class="item__description">--}}
{{--                                            <div class="item__action">#3 <span>$5.77</span></div>--}}
{{--                                            <div class="item__name">Nedjai Mohamed</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="item__time">Jun 14 - 4:12 PM</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="item__control">
{{--                        <div class="item__head">--}}
{{--                            <div class="item__description">--}}
{{--                                <div class="item__info">Highest bid by <span>Nedjai Mohamed</span></div>--}}
{{--                                <div class="item__currency">--}}
{{--                                    <div class="item__price">$573.77</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <a href="javascript:void(0)" data-id="{{$product->id}}" class="button item__button add-to-cart">{{__("Order now")}}</a>
{{--                        <div class="item__btns">--}}
{{--                            <button class="button item__button js-popup-open add-to-cart"--}}
{{--                               data-id="{{$product->id}}"--}}
{{--                             >{{__("Purchase now")}}</button>--}}
{{--                            <a class="button-stroke item__button js-popup-open" href="#popup-bid"--}}
{{--                               data-effect="mfp-zoom-in">Place a bid</a></div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
