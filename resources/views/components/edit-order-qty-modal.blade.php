
<div class="popup popup_connect mfp-hide" id="EditeOrderQtyModal" style="max-width: 600px;">
    <form action="" id="EditeOrderQtyForm" method="POST">
        @csrf
        @method('put')
        <div class="popup__img">
            <i class="fal fa-map-marked"></i>
        </div>
        <h5 class="h5 text-center">{{__("Edit quantity")}}</h5>

        <div class="billing__item">
            <div class="billing__fieldset">
                <div class="row justify-content-start">
                    <div class="col-md-12">
                        <div class="field field__style__one">
                            <div class="field__label">{{__("QUANTITY")}}</div>
                            <div class="field__wrap">
                                <input min="1" class="field__input form-control" type="number" name="qty" id="qty_edit"  required="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="popup__btns">
            <button class="button popup__button" type="submit">{{__("Edit quantity")}}</button>
            <button type="button" class="button-stroke popup__button js-popup-close">{{__("Cancel")}}</button>
        </div>
    </form>
</div>

