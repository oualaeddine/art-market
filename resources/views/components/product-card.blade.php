<div class="product__default__card card border-0">
    <a href="{{route('product',['product'=>$product->slug])}}" class="product__card__preview">
        <img class="front__card__preview"
             src="{{asset($product->image??'https://toka.b-cdn.net/wp-content/uploads/2022/04/vrgvg.png')}}"
             alt="Card preview"/>
        <img class="back__card__preview"
             src="{{asset($product->images->first()->image??$product->image??'https://toka.b-cdn.net/wp-content/uploads/2022/04/vrgvg.png')}}"
             alt="Card preview"/>
    </a>
    <div class="card__default__informations">
        <div class="card__body">
            @if($product->discount)

                <div class="item__categories" style="z-index: 5">
                    <div class="status-purple item__category">{{$product->discount."% " }}{{ __("Discount")}} 🔥</div>
                </div>
            @endif

            <div class="card__line">
                <h6 class="h6 mb-4">
                    @if(\Illuminate\Support\Facades\Route::currentRouteName()!='vendor-detail')
                        <small
                            class="d-block font-weight-light">{{$product->vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</small>
                    @endif
                    {{$product->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}
                </h6>
            </div>
            <div class="product__default__card__prices align-items-center d-flex justify-content-between">
                @if($product->price_old && $product->price_old!=0)
                    <div class="the__price__discount">{{number_format($product->price_old,2).' '. trans('DA')}}</div>
                @endif
                <div class="the__price text-right">{{number_format($product->price,2).' '. trans('DA')}}</div>
            </div>
        </div>

        <div class="card__additionel__informations d-flex align-items-center justify-content-between">
            <a href="javascript:void(0)" data-id="{{$product->id}}"
               class="card__additionel__informations__btn add-to-cart">{{__("Order now")}}</a>
            {{--            <span class="card__additionel__informations__orders">4,532 order on this product</span>--}}
        </div>
    </div>
</div>
