<div class="item__description__reting__section hot pb-20 pt-15">
    <div class="container">
        <div class="hot__wrapper">
            <div class="">
                <div class="popular__stage">{{__("Browser Related products")}}</div>
                <h3 class="hot__title h3">{{__("And what people most like")}}</h3>
            </div>

            <div class="hot__inner">
                <div class="hot__slider js-slider-hot">
                    @foreach($products as $product)
                        <x-product-card :product="$product"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
