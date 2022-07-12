<div class="modal fade" id="modals-edit-client-address"  role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action=""
                  method="POST" id="form-edit-client-address">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Modifier une adresse</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card">

                        <div class="card-header">


                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6">
                            <label class="mb-1">Adresse</label> <b class="text-danger">*</b>
                            <input
                                type="text"
                                required
                                class="form-control set-req"
                                id="address_edit"
                                name="address"
                                placeholder=""
                                aria-label=""

                            />
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label class="mb-1">Commune</label> <b class="text-danger">*</b>
                            <select name="commune_id" class="form-control commune_address_id_edit" id="commune_id_edit" required>
                            </select>

                        </div>


                        <div class="form-group col-sm-12 col-md-3">
                            <label class="mb-1">Code postal</label>
                            <input
                                type="number"
                                class="form-control set-req"
                                id="code_postal_edit"
                                name="code_postal"
                                placeholder=""
                                aria-label=""

                            />
                        </div>
                    </div>

                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Modifier</button>
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


