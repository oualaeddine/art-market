<div class="col-md-6">
    <div class="profile__address__box" style="height: auto">
        @if(!$address->has_orders)
            <span class="profile__address__box__default" style="top: 15px;right: 15px;">
                                <i class="fal fa-edit"
                                   onclick='EditAddress({{$address->id}},{{$address->commune->id_wilaya}},{{$address->commune_id}},"{{$address->commune->{app()->getLocale()=='fr'?'name':'name_ar'} }}",{{$address->code_postal}},"{{$address->address}}")' data-toggle="modal"
                                   data-target="#EditAddressModal"></i>
                                <i class="fal fa-trash text-danger js-popup-open"
                                   onclick="DeleteAddress({{$address->id}})" data-effect="mfp-zoom-in" tabindex="0"
                                   href="#DeleteAddressModal"></i>
                            </span>
        @endif

        <div class="profile__address__box_adress">{{$address->address}}</div>
        <div
            class="profile__address__box_country">{{$address->commune->wilaya->{app()->getLocale()=='fr'?'name':'name_ar'}.' - ' .$address->commune->{app()->getLocale()=='fr'?'name':'name_ar'} }}</div>
                                            <div class="profile__address__box_phone">{{$address->code_postal}}</div>
    </div>
</div>


