<div class="card border-0">
    <div class="card__preview">
        <img src="https://i.etsystatic.com/6120089/r/il/93acdb/1571178682/il_794xN.1571178682_m7ex.jpg" alt="Card preview">

        <div class="card__control">
            <a href="#" class="button-small card__button text-white" tabindex="0"><span>{{__("View products now")}}</span></a>
        </div>
    </div>
    <a class="card__link" href="item.html" tabindex="0">
        <div class="card__body">
            <div class="card__line">
                <div class="card__title">{{$vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }} <small class="d-block font-weight-light">{{__("more then")}} {{$vendor->products_count}} {{__("products")}}</small></div>
            </div>
        </div>
    </a>
</div>
