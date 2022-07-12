<div class="modal fade get-coupon-area"  role="dialog" id="modals-create-client-address">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel">
            <form id="address_submiter"
                action="{{route('client.store.address',['client'=>$client->id])}}"
                method="POST">
                @csrf
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal-header">
                        <h4 class="modal-title">{{app()->getLocale()=='ar'?'أضف عنوانا':'Ajouter une adresse'}}</h4>
                    </div>
                    <div class="modal-body">

                        <div class="">

                            <div class="">
                                <div class="row {{app()->getLocale()=='ar'?'text-right':'text-left'}}">
                                    <div class="form-group col-sm-12 col-md-9">
                                        <label class="mb-1">{{app()->getLocale()=='ar'?'البلدية':'Commune'}}</label>
                                        <select style="width: 100%!important"  name="commune_id" class="form-control commune_address_id input-lg"  required>
                                            <option value="" selected disabled>{{app()->getLocale()=='ar'?' اختر البلدية':'Sélectionnez une commune'}}</option>
                                            @foreach ($communes as $s)
                                                <option value="{{$s->id}}">{{\Illuminate\Support\Facades\Session::get('client_lang')?($s->name_ar??$s->name):$s->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>



                                    <div class="form-group col-sm-12 col-md-3">
                                        <label class="mb-1">{{app()->getLocale()=='ar'?'الرمز البريدي':'Code postal'}}</label>
                                        <input
                                            type="number"
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
                        <button id="address_submiterbtn" type="submit" class="btn btn-color ">{{app()->getLocale()=='ar'?'أضف ':"Ajouter"}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
