<div class="popup popup_connect mfp-hide" id="popup-new-adress">
    <form action="{{route('client.store.address')}}" method="POST">
        @csrf
        <div class="popup__img">
            <i class="fal fa-map"></i>
        </div>
        <h5 class="h5 text-center">{{__("Add a new address")}}</h5>

        <div class="billing__item">

            <div class="billing__fieldset">
                <div class="row justify-content-start">
                    <div class="col-md-12">
                        <div class="field field field__style__one select__field">
                            <div class="field__label">{{__("Wilaya")}}</div>
                            <div class="field__wrap">
                                <select required class="select" name="wilaya" id="wilaya_id">
                                    <option value="" selected disabled>{{__('Your wilaya')}}</option>
                                    @foreach($wilayas as $wilaya)
                                        <option
                                            value="{{$wilaya->id}}">{{"( $wilaya->id ) ". $wilaya->{app()->getLocale()=='fr'?'name':'name_ar'} }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="field field__style__one select__field">
                            <div class="field__label">{{("Commune")}}</div>
                            <div class="field__wrap">
                                <select required class="select" id="commune_id" name="commune_id">
                                    <option value="" selected disabled>{{__('Your commune')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 pl-0">
                        <div class="field field__style__one">
                            <div class="field__label">{{__("ZIP")}}</div>
                            <div class="field__wrap">
                                <input class="field__input" type="number" name="code_postal">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row justify-content-start">
                    <div class="col-md-12">
                        <div class="field field__style__one">
                            <div class="field__label">{{__("Your address")}}</div>
                            <div class="field__wrap">
                                <input class="field__input" type="text" name="address" required="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <div class="popup__btns">
            <button class="button popup__button" type="submit">{{__("Save address")}}</button>
            <button class="button-stroke popup__button js-popup-close">{{__("Cancel")}}</button>
        </div>
    </form>
</div>
