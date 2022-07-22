<div class="hot__slide">
    <div class="card border-0">
        <div class="card__preview">
            <img src="{{asset($product->image??'https://toka.b-cdn.net/wp-content/uploads/2022/04/frfrghj.png')}}" style="height: 450px;
    object-fit: cover;" alt="Card preview" />

            <div class="card__control">
                <div class="item__categories" style="z-index: 5">
                    <div class="status-purple item__category">{{$product->discount."% " }}{{ __("Discount")}} 🔥</div>
                </div>
                <a href="javascript:void(0)" class="button-small card__button text-white add-to-cart" data-id="{{$product->id}}"><span>{{__("Order now")}}</span></a>
            </div>
        </div>
        <a class="card__link" href="{{(route('product',['product'=>$product->slug]))}}">
            <div class="card__body">
                <div class="card__line">
                    <div class="card__title">{{$product->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}
                        <small class="d-block font-weight-light">{{$product->vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</small>
                    </div>
                </div>

                <div class="mt-5 mb-3 d-flex justify-content-between align-items-center">
{{--                    <div class="card__counter"></div>--}}
                    <div class=""style="text-decoration: line-through">{{number_format($product->price_old,2).' '. trans('DA')}}</div>
                    <div class="card__price">{{number_format($product->price,2).' '.trans("DA")}}</div>
                </div>
            </div>
            <div class="card__foot">
                <div class="card__status">{{__("Categories")}} <span>{{Arr::join($product->categories->pluck(app()->getLocale()=='fr'?'name_fr':'name_ar')->toArray(),', ',trans('and'))}}</span></div>
            </div>
        </a>
    </div>
</div>
