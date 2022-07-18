<div class="product__default__card card border-0">
    <a href="{{route('product',['product'=>$product->slug])}}" class="product__card__preview">
        <img class="front__card__preview" src="{{asset($product->image??'https://toka.b-cdn.net/wp-content/uploads/2022/04/vrgvg.png')}}" alt="Card preview" />
        <img class="back__card__preview" src="{{asset($product->images->first()->image??$product->image??'https://toka.b-cdn.net/wp-content/uploads/2022/04/vrgvg.png')}}" alt="Card preview" />
    </a>
    <div class="card__default__informations">
        <div class="card__body">
{{--            <button class="card__favorite">--}}
{{--                <svg class="icon icon-heart">--}}

{{--                </svg>--}}
{{--            </button>--}}

            <div class="card__line">
                <h6 class="h6 mb-4">
                    <small class="d-block font-weight-light">{{$product->vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</small>
                    {{$product->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}
                </h6>
            </div>
            <div class="product__default__card__prices align-items-center d-flex justify-content-end">
                <div class="the__price__discount" style="text-decoration: none">{{number_format($product->price,2).' '. trans('DA')}}</div>
{{--                <div class="the__price text-right"></div>--}}
            </div>
        </div>

        <div class="card__additionel__informations d-flex align-items-center justify-content-between">
            <a href="javascript:void(0)" data-id="{{$product->id}}" class="card__additionel__informations__btn add-to-cart">{{__("Order now")}}</a>
{{--            <span class="card__additionel__informations__orders">4,532 order on this product</span>--}}
        </div>
    </div>
</div>
