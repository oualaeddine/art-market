<div class="outer__inner ">
    <div class="container">
        <x-vendors-page-hero />
        <div class="catalog mt-4 pt-5 pb-25">
            <div class="d-lg-flex justify-content-between align-items-center mb-15">
                <h6 class="h6">
                    <p class="">
                        {!! __('Showing') !!}
                        <span class="font-medium">{{ $vendors->firstItem()??'0' }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $vendors->lastItem()??'0' }}</span>
                        {!! __('of') !!}
                        <span class="font-medium">{{ $vendors->total() }}</span>
                        {!! __('results') !!}
                    </p>
                </h6>
                <div class="w-60">
                    <input class="header__input " wire:model.debounce="search" type="text" name="search" placeholder="Search" required="">
                </div>
                <div class="right__side__options d-lg-flex align-items-center">

                    <div class="catalog__sorting mb-0 mr-5">
                        <select class="select" wire:model="sort_by">
                            <option value="default"  >{{__("Nom (A à Z)")}}</option>
                            <option value="name_fr-desc" >{{__("Nom (Z à A)")}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="catalog__row" >
                <div class="catalog__wrapper">
                    <div class="catalog__list">
                        @if($vendors->isNotEmpty())

                            @foreach($vendors as $vendor)
                                <x-vendor-card :vendor="$vendor" />
                            @endforeach
                        @else

                            <x-no-data />

                        @endif

                    </div>
                    <div class="more__products__btns d-flex justify-content-center mt-15">
                        <div class="catalog__pagination mr-5">
                            {{$vendors->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    $(document).on("change", ".select", function (e) {
        @this.set('sort_by', e.target.value);
    })
</script>
