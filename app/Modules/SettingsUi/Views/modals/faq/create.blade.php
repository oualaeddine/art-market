<div class="modal fade" id="modals-add-faq" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action="{{route('admin.faq.store')}}"
                  method="POST" >
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une faq</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="form-group col-sm-12  ">
                            <label class="form-label" for="name_fr">Language</label> <b class="text-danger">*</b>
                            <select required class="form-control" name="lang" id="lang">
                                <option value="" selected disabled>sélectionner un langue</option>
                                <option value="fr"  >FR</option>
                                <option value="ar"  >AR</option>
                            </select>
                        </div>
{{--                        <div class="form-group col-sm-12 col-md-6  ">--}}
{{--                            <label class="form-label" for="name_fr">Active</label> <b class="text-danger">*</b>--}}
{{--                            <select required class="form-control" name="is_active" id="is_active">--}}
{{--                                <option value="" selected disabled>sélectionner un état</option>--}}
{{--                                <option value="1"  >Oui</option>--}}
{{--                                <option value="0"  >Non</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

                        <div class="form-group col-sm-12 col-md-6">
                            <label class="form-label" for="name_fr">Question<b class="text-danger">*</b></label>
                            <textarea required class="form-control" name="question" id="question" cols="30" rows="10"></textarea>
                        </div>


                        <div class="form-group col-sm-12 col-md-6" >
                            <label class="form-label" for="name_ar">Réponsee<b class="text-danger">*</b></label>
                            <textarea required class="form-control" name="answer" id="question" cols="30" rows="10"></textarea>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
