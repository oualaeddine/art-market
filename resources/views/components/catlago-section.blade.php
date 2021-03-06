<div>
    <div class="catalog pt-15 pb-25">
        <div class="container">
            <div class="d-lg-flex justify-content-between align-items-center mb-15">
                <h6 class="h6">
                    <p class="">
                        {!! __('Showing') !!}
                        <span class="font-medium">{{ $products->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $products->lastItem() }}</span>
                        {!! __('of') !!}
                        <span class="font-medium">{{ $products->total() }}</span>
                        {!! __('results') !!}
                    </p>
                </h6>

                <div class="right__side__options d-lg-flex align-items-center">

                    <div class="catalog__sorting mb-0 mr-5">
                        <select class="select" id="sort-prods">
                            <option value="name_fr-asc" @if ($sort_by == 'name_fr-asc' ) selected  @endif >{{__("Nom (A à Z)")}}</option>
                            <option value="name_fr-desc" @if ($sort_by == 'name_fr-desc' ) selected  @endif>{{__("Nom (Z à A)")}}</option>
                            <option value="price-asc" @if ($sort_by == 'price-asc' ) selected  @endif>{{__("Prix (Bas > Elevé)")}}</option>
                            <option value="price-desc" @if ($sort_by == 'price-desc' ) selected  @endif>{{__("Prix (Elevé > Bas)")}}</option>
                        </select>
                    </div>
                    <button class="sidebar__filter__toggle">
                        <span class="closed__discover__filter">{{__("Filter")}} <i class="fad fa-sliders-h"></i></span> <i class="fal fa-times opened__discover__filter"></i>
                    </button>
                    <button class="ml-2" style="position: relative;    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-shrink: 0;
                    border-radius: 24px;
                    font-family: 'Sofia Pro', sans-serif;
                    font-size: 14px;
                    color: #2e3335;
                    transition: all .2s;
                    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                    border: 0;
                    outline: none !important;">
                        <a href="{{\Illuminate\Support\Facades\URL::current()}}" style="text-decoration: none" class="text-reset text-red"><i class="fad text-red fa-redo-alt"></i></a>
                    </button>
                </div>
            </div>

            <div class="catalog__row">
                <div class="catalog__wrapper">
                    <div class="catalog__list">
                        @if($products->isNotEmpty())
                            @foreach($products as $product)
                                <x-product-card :product="$product" />
                            @endforeach
                        @else
                            <x-no-data />
                        @endif

                    </div>

                    <div class="more__products__btns d-flex justify-content-center mt-15">
                        <div class="catalog__pagination mr-5">
                            {{$products->links('pagination::bootstrap-5-custom')}}
{{--                            <nav aria-label="Page navigation example">--}}
{{--                                <ul class="pagination">--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
{{--                                </ul>--}}
{{--                            </nav>--}}
                        </div>
{{--                        <button class="more__products__btn">--}}
{{--                            <span class="more__products__text">load more</span> <span class="more__products__icon"><i class="fad fa-spinner-third"></i></span>--}}
{{--                        </button>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
