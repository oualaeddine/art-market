<div class="card border-0">
    <div class="card__preview">
        <img src="{{$vendor->logo_fr??'	https://toka.b-cdn.net/wp-content/uploads/2022/03/NFT-25.png'}}" style="height: 300px;object-fit: initial;" alt="Card preview">

        <div class="card__control">
            <a href="{{route('vendor-detail',['vendor'=>$vendor->name_fr])}}" class="button-small card__button text-white" tabindex="0"><span>{{__("View products now")}}</span></a>
        </div>
    </div>
    <a class="card__link" href="{{route('vendor-detail',['vendor'=>$vendor->name_fr])}}" tabindex="0">
        <div class="card__body">
            <div class="card__line">
                <div class="card__title">{{$vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }} <small class="d-block font-weight-light">{{__("more then")}} {{$vendor->products_count}} {{__("products")}}</small></div>
            </div>
        </div>
    </a>
</div>
