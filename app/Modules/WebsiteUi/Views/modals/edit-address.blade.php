<div class="modal fade get-coupon-area"  role="dialog" id="modals-edit-address-{{$item->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel">
            <form
                action="{{route('client.update.address',['client_address'=>$item->id])}}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal-header">
                        <h4 class="modal-title">{{app()->getLocale()=='ar'?'تعديل العنوان':'Modifier une adresse'}}</h4>
                    </div>
                    <div class="modal-body">

                        <div class="card">

                            <div class="card-header">
                                <div class="row {{app()->getLocale()=='ar'?'text-right':'text-left'}}">
                                    <div class="form-group col-sm-12 col-md-9">
                                        <label class="mb-1">{{app()->getLocale()=='ar'?'البلدية':'Commune'}}</label>
                                        <select style="width: 100%!important"  name="commune_id" class="form-control commune_address_id input-lg"  required>
                                            <option value="" selected disabled>{{app()->getLocale()=='ar'?' اختر البلدية':'Sélectionnez une commune'}}</option>
                                            @foreach ($communes as $s)
                                                <option {{$s->id == $item->commune_id?'selected':''}} value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>



                                    <div class="form-group col-sm-12 col-md-3">
                                        <label class="mb-1">{{app()->getLocale()=='ar'?'الرمز البريدي':'Code postal'}}</label>
                                        <input
                                            type="number"
                                            value="{{$item->code_postal}}"
                                            class="form-control set-req"
                                            name="code_postal"
                                            placeholder=""
                                            aria-label=""
                                        />
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="mb-1">{{app()->getLocale()=='ar'?'العنوان':'Adresse'}}</label>
                                        <input
                                            type="text"
                                            required
                                            class="form-control set-req"
                                            name="address"
                                            value="{{$item->address}}"
                                            placeholder=""
                                            aria-label=""

                                        />
                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal"
                                aria-label="Close" class="btn btn-google-plus " data-bs-dismiss="modal">{{app()->getLocale()=='ar'?'اغلاق':"Fermer"}}</button>
                        <button type="submit" class="btn btn-color ">{{app()->getLocale()=='ar'?'تعديل':"Modifier"}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
