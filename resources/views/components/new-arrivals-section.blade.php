<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <div class="section discover py-20">
        <div class="container">
            <div class="main__title__text d-flex align-items-center justify-content-between mb-15">
                <div class="title__text">
                    <h3 class="hot__title__outline h3 mb-0">{{__("New")}}<span>{{__("Arrivals")}}</span></h3>
                    <div class="popular__stage">{{__("Enjoy the summer time and shop our latest Products")}}</div>
                </div>
                <div class="title__more__btn">
                    <a href="#" class="btn btn-outline-dark py-1 px-10">{{__('View all products')}}</a>
                </div>
            </div>

{{--            <div class="discover__top justify-content-between align-items-center">--}}
{{--                <div class="discover__nav">--}}
{{--                    <a class="discover__link active" href="#"><i class="fad fa-ball-pile"></i> All products</a>--}}
{{--                    <a class="discover__link" href="#"><i class="fad fa-globe"></i> Best sallers</a>--}}
{{--                    <a class="discover__link" href="#"><i class="fad fa-tshirt"></i> Tops</a>--}}
{{--                    <a class="discover__link" href="#"><i class="fad fa-mitten"></i> Pants & Tights</a>--}}
{{--                    <a class="discover__link" href="#"><i class="fad fa-boot"></i> Shoes <span class="onsalle">-22%</span></a>--}}
{{--                    <a class="discover__link" href="#"><i class="fad fa-sunglasses"></i> Sunglasses</a>--}}
{{--                </div>--}}

{{--                <div class="tablet-show">--}}
{{--                    <select class="select">--}}
{{--                        <option>All items</option>--}}
{{--                        <option>Art</option>--}}
{{--                        <option>Game</option>--}}
{{--                        <option>Photography</option>--}}
{{--                        <option>Music</option>--}}
{{--                        <option>Video</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <button class="discover__filter">--}}
{{--                    <span class="closed__discover__filter">Filter <i class="fad fa-sliders-h"></i></span> <i class="fal fa-times opened__discover__filter"></i>--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <div class="discover__filters">--}}
{{--                <div class="discover__sorting">--}}
{{--                    <div class="discover__cell">--}}
{{--                        <div class="field">--}}
{{--                            <div class="field__wrap">--}}
{{--                                <select class="select">--}}
{{--                                    <option>Price</option>--}}
{{--                                    <option>The lowest price</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="discover__cell">--}}
{{--                        <div class="field">--}}
{{--                            <div class="field__wrap">--}}
{{--                                <select class="select">--}}
{{--                                    <option>Colour</option>--}}
{{--                                    <option>Least liked</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="discover__cell">--}}
{{--                        <div class="field">--}}
{{--                            <div class="field__wrap">--}}
{{--                                <select class="select">--}}
{{--                                    <option>Season</option>--}}
{{--                                    <option>All</option>--}}
{{--                                    <option>Most liked</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="discover__cell">--}}
{{--                        <div class="field">--}}
{{--                            <div class="field__wrap">--}}
{{--                                <select class="select">--}}
{{--                                    <option>purpose</option>--}}
{{--                                    <option>All</option>--}}
{{--                                    <option>Most liked</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="discover__cell">--}}
{{--                        <div class="field">--}}
{{--                            <div class="field__wrap">--}}
{{--                                <select class="select">--}}
{{--                                    <option>Style</option>--}}
{{--                                    <option>All</option>--}}
{{--                                    <option>Most liked</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="discover__cell">--}}
{{--                        <div class="field">--}}
{{--                            <div class="field__wrap">--}}
{{--                                <select class="select">--}}
{{--                                    <option>Matriel</option>--}}
{{--                                    <option>All</option>--}}
{{--                                    <option>Most liked</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="discover__list">
                <div class="discover__slider js-slider-discover js-slider-resize">
                    @foreach($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            </div>
{{--            <div class="more__products__btns d-flex justify-content-center mt-15">--}}
{{--                <button class="more__products__btn">--}}
{{--                    <span class="more__products__text">load more</span> <span class="more__products__icon"><i class="fad fa-spinner-third"></i></span>--}}
{{--                </button>--}}
{{--            </div>--}}
        </div>
    </div>

</div>
