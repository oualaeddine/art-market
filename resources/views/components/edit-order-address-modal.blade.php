
<div class="popup popup_connect mfp-hide" id="EditeOrderAddressModal" style="max-width: 600px;">
    <form action="" id="EditeOrderAddressForm" method="POST">
        @csrf
        @method('put')
        <div class="popup__img">
            <i class="fal fa-map-marked"></i>
        </div>
        <h5 class="h5 text-center">{{__("Edit Address")}}</h5>

        <div class="billing__item">
            <div class="billing__fieldset">
                <div class="row justify-content-start">
                    <div class="col-md-12">
                        <div class="field field field__style__one select__field">
                            <div class="field__label">{{__("Address")}}</div>
                            <div class="field__wrap">
                                <select required class="form-control " name="address_id" id="address_id" >
                                    @foreach($client->addresses as $address)
                                        <option
                                            value="{{$address->id}}">{{$address->address }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="popup__btns">
            <button class="button popup__button" type="submit">{{__("Edit Address")}}</button>
            <button type="button" class="button-stroke popup__button js-popup-close">{{__("Cancel")}}</button>
        </div>
    </form>
</div>

