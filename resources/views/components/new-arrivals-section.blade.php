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
                    <a href="{{route('shop')}}" class="btn btn-outline-dark py-1 px-10">{{__('View all products')}}</a>
                </div>
            </div>

            <div class="discover__list">
                @if($products->isNotEmpty())
                    <div class="discover__slider js-slider-discover js-slider-resize">
                        @foreach($products as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>
                @else
                    <x-no-data />
                @endif

            </div>
        </div>
    </div>

</div>
