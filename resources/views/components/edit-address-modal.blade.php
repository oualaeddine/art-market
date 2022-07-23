<div class="modal fade" id="EditAddressModal" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-edit-address" method="POST">
                    @csrf
                    @method('put')
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
                                            <select required class="form-control wilaya_id_edit" name="wilaya"  style="border-radius: 15px;
    border: 1px solid #d9d9e6;
    height: 55px;">
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
                                            <select required class="form-control commune_id_edit"  name="commune_id">
                                                <option value="" selected disabled>{{__('Your commune')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 pl-0">
                                    <div class="field field__style__one">
                                        <div class="field__label">{{__("ZIP")}}</div>
                                        <div class="field__wrap">
                                            <input required class="field__input" type="text" id="zip_edit" name="code_postal" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" pattern=".{5}" title="Please, enter 5 numbers">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-start">
                                <div class="col-md-12">
                                    <div class="field field__style__one">
                                        <div class="field__label">{{__("Your address")}}</div>
                                        <div class="field__wrap">
                                            <input class="field__input" type="text" name="address" id="address_edit" required="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


                    <div class="popup__btns">
                        <button class="button popup__button" type="submit">{{__("Save address")}}</button>
                        <button class="button-stroke popup__button js-popup-close" data-dismiss="modal">{{__("Cancel")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
