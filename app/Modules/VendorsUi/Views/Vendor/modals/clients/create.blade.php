<div class="modal fade" id="modals-vendor-add_client" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0"   action="{{route('vendor.clients.store')}}"
                  method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un client
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-control-label">Client</label> <b class="text-danger">*</b>
                                <select class="form-select form-control" name="client_id" id="client_id">
                                    <option value=""  selected>Sélectionner un client</option>

                                </select>
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
<style>
    .card .card-header h5:after {

        display: none !important;

    }
</style>

