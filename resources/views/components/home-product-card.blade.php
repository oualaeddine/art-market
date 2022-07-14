<div class="hot__slide">
    <div class="card border-0">
        <div class="card__preview">
            <img src="{{$product->image??'https://i.etsystatic.com/6120089/r/il/93acdb/1571178682/il_794xN.1571178682_m7ex.jpg'}}" alt="Card preview" />

            <div class="card__control">
{{--                <div class="status-green card__category">Currently on sale! <span role="img" aria-label="fire">🔥</span></div>--}}
{{--                <button class="card__favorite">--}}
{{--                    <svg class="icon icon-heart">--}}
{{--                    </svg>--}}
{{--                </button>--}}
                <a href="javascript:void(0)" class="button-small card__button text-white add-to-cart" data-id="{{$product->id}}"><span>{{__("Place an order now")}}</span></a>
            </div>
        </div>
        <a class="card__link" href="{{(route('product',['product'=>$product->slug]))}}">
            <div class="card__body">
                <div class="card__line">
                    <div class="card__title">{{$product->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}
{{--                        <small class="d-block font-weight-light">more then 4,532 customers like this</small>--}}
                    </div>
                </div>

                <div class="mt-5 mb-3 d-flex justify-content-between align-items-center">
                    <div class="card__counter">{{$product->vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</div>
                    <div class="card__price">{{number_format($product->price,2).' '.trans("DA")}}</div>
                </div>
            </div>
            <div class="card__foot">
                <div class="card__status">{{__("CATEGORY")}} <span>{{$product->categories->first()->name_fr}}</span></div>
            </div>
        </a>
    </div>
</div>
