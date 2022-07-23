
<div class="popup popup_connect mfp-hide" id="DeleteAddressModal">
    <form action="" id="DeleteAddressForm" method="POST">
        @csrf
        @method('delete')
        <div class="popup__img bg-red">
            <i class="fal fa-map"></i>
        </div>
        <h5 class="h5 text-center">{{__("Delete address")}}</h5>

        <div class="billing__item">

        </div>

        <div class="popup__btns">
            <button class="button popup__button bg-red" type="submit">{{__("Delete address")}}</button>
            <button type="button" class="button-stroke popup__button js-popup-close">{{__("Cancel")}}</button>
        </div>
    </form>
</div>

