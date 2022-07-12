<div class="modal fade" id="modals-create-client-coupon" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action="{{route('admin.clients.coupon.assign',['client'=>$client->id])}}"
                  method="POST" >
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une coupon</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card">

                        <div class="card-header">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="mb-1">Fammilie</label> <b class="text-danger">*</b>
                                    <select name="family_id"  id="family_id" class="form-control"  required>
                                        <option value="" selected disabled>Sélectionnez une fammilie</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="mb-1">référence canal de vente</label> <b class="text-danger">*</b>
                                    <input type="text" required name="store_rf" class="form-control" >
                                </div>
                            </div>

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
