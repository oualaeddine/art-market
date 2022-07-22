<div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
    <div class="section-bg popular py-20">
        <div class="container">
            <div class="popular__top">
                <div class="popular__box">
                    <div class="popular__stage">{{__("Browse popular categories")}}</div>
                    <h3 class="hot__title h3 mb-0">{{__("Principle categories")}}</h3>

                </div>
            </div>
            <div class="popular__wrapper">
                @if($categories->isNotEmpty())

                    <div class="popular__slider js-slider-popular">

                        @foreach($categories as $category)
                            <x-category-card :category="$category"/>

                        @endforeach

                    </div>
                @else
                    <x-no-data/>
                @endif
            </div>
        </div>
    </div>
</div>
