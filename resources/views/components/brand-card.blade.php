<div class="popular__slide">
    <div class="popular__item">
{{--        <div class="popular__head justify-content-center">--}}
{{--            <div class="popular__rating" style="background-color: #9757d7;">--}}
{{--                <div class="popular__number">Best phone brand category</div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="popular__body">
            <div class="company__logo d-block mb-4"><img class="mx-auto" src="{{asset($brand->image)??'website/images/customers/logo-08.png'}}" alt="company" /></div>
            <div class="popular__name">{{app()->getLocale()=='fr'?$brand->name_fr:$brand->name_ar}}</div>
            <div class="popular__price"><span>{{$brand->products_count}}</span> {{__("product")}}</div>
            <a class="button-stroke main__button d-flex w-100 mt-5" href="search01.html">{{__('Shop')}}</a>
        </div>
    </div>
</div>
