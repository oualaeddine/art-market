<div>
    <div class="wrapper__sidebar__filter__shop_section"></div>
    <div class="sidebar__filter__shop_section">
        <div class="sidebar__filter__shop_section__header d-flex justify-content-between align-items-top">
            <div class="sidebar__filter__shop_section__header__text">
                <h5 class="h5 mb-0">{{__("Filter your search")}}</h5>
            </div>
            <a class="sidebar__filter__shop_section__closebtn"><i class="fal fa-times"></i></a>
        </div>

        <div class="sidebar__filter__shop_section__body mt-8">

            <h6 class="sidebar__filter__shop_section__body__element__title">{{__("Category")}}</h6>
            <ul class="sidebar__filter__shop_section__body__element__ul">
                @foreach($categories as $category)
                    <li>
                        <a href="javascript:void(0)" data-id="{{$category->name_fr}}" class="category-link  {{$selected_category==$category->name_fr?'bg-gray-3  p-1 rounded ':''}}"><span class="text">{{$category->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</span> <span class="number">{{$category->products_count}}</span></a>
                    </li>
                @endforeach
            </ul>


            <h6 class="sidebar__filter__shop_section__body__element__title">{{__("Brand")}}</h6>
            <ul class="sidebar__filter__shop_section__body__element__ul">
                @foreach($brands as $brand)
                    <li>
                        <a href="javascript:void(0)" data-id="{{$brand->name_fr}}" class="brand-link {{$selected_brand==$brand->name_fr?'bg-gray-3  p-1 rounded ':''}}" ><span class="text">{{$brand->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</span> <span class="number">{{$brand->products_count}}</span></a>
                    </li>
                @endforeach
            </ul>

{{--            <h6 class="sidebar__filter__shop_section__body__element__title">Size</h6>--}}
{{--            <div class="sidebar__filter__shop_section__body__element__size">--}}
{{--                <a id="size_1">S<span>25</span></a>--}}
{{--                <a id="size_1">M<span>25</span></a>--}}
{{--                <a id="size_1">L<span>25</span></a>--}}
{{--                <a id="size_1">XL<span>25</span></a>--}}
{{--                <a id="size_1">XXL<span>25</span></a>--}}
{{--            </div>--}}
            <h6 class="sidebar__filter__shop_section__body__element__title">{{__("Vendor")}}</h6>
            <ul class="sidebar__filter__shop_section__body__element__ul">
                @foreach($vendors as $vendor)
                    <li>
                        <a href="javascript:void(0)" data-id="{{$vendor->name_fr}}" class="vendor-link {{$selected_vendor?->name_fr==$vendor->name_fr?'bg-gray-3  p-1 rounded ':''}}"><span class="text">{{$vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</span> <span class="number">{{$vendor->products_count}}</span></a>
                    </li>
                @endforeach

            </ul>

{{--            <h6 class="sidebar__filter__shop_section__body__element__title">Use</h6>--}}
{{--            <ul class="sidebar__filter__shop_section__body__element__ul">--}}
{{--                <li>--}}
{{--                    <a href="#"><span class="text">Beachwear</span> <span class="number">25</span></a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#"><span class="text">Casual</span> <span class="number">25</span></a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#"><span class="text">Holiday</span> <span class="number">25</span></a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#"><span class="text">Partywear</span> <span class="number">25</span></a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#"><span class="text">Workwear</span> <span class="number">25</span></a>--}}
{{--                </li>--}}
{{--            </ul>--}}

            <h6 class="sidebar__filter__shop_section__body__element__title">{{__("Price range")}}</h6>
            <div class="range mt-5 px-5 mx-5">
                <div class="range__slider js-slider" data-min="0" data-max="1000000" data-start="{{$price??0}}" data-step="1" data-tooltips="true" data-postfix=" DA"></div>
                <div class="range__indicators">
                    <div class="range__text">{{number_format(($price??0),2).' '. trans('DA')}}</div>
                    <div class="range__text">{{number_format(1000000,2).' '. trans('DA')}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
