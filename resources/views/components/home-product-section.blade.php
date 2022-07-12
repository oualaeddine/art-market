<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    <div class="section hot py-25">
        <div class="container">
            <div class="hot__wrapper">
                <div class="">
                    <div class="popular__stage">{{__("Browser the most popular products")}}</div>
                    <h3 class="hot__title h3">{{__("Right now")}}</h3>
                </div>
                <div class="hot__inner">
                    <div class="hot__slider js-slider-hot">
                        @foreach($products as $product)
                            <x-home-product-card :product="$product" />
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
