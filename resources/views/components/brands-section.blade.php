<div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
    <div class="section-bg popular py-20">
        <div class="container">
            <div class="popular__top">
                <div class="popular__box">
                    <div class="popular__stage">{{__("Browser products by most popular")}}</div>
                    <h3 class="hot__title h3 mb-0">{{__("Brands")}}</h3>
                </div>
            </div>
            <div class="popular__wrapper">
                @if($brands->isNotEmpty())

                    <div class="popular__slider js-slider-popular">

                        @foreach($brands as $brand)
                            <x-brand-card :brand="$brand"/>

                        @endforeach

                    </div>
                @else
                    <x-no-data/>
                @endif
            </div>
        </div>
    </div>
</div>
