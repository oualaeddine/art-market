<div class="item__description_reting_section pb-10">
    <div class="container">
        <div class="item__tabs js-tabs item__description_reting_tabs">
            <div class="item__nav">
                <span class="disabled btn btn-black rounded">{{__('Description')}}</span>
                {{--                    <a class="item__link js-tabs-link" href="#">Reviews (533)</a>--}}
            </div>

            <div class="item__container">
                <div class="item__box js-tabs-item" style="display: block;">
                    <p class="item__description_reting_text">
                        {{$product->{app()->getLocale()=='fr'?'desc_fr':'desc_ar'} }}.
                    </p>

                </div>

{{--                <div class="item__box js-tabs-item">--}}
{{--                    test2--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
