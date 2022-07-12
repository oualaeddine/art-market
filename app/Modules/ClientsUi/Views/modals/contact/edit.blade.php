<div class="modal fade" id="modals-edit-contact"  role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action=""
                  method="POST" id="form-edit-contact">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Modifier un contact</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card">

  
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="mb-1">Statut</label>
                                <select name="status" class="form-control " id="status_edit" required>
                                    <option value="Pending">En attente</option>
                                    <option value="Done">Fait</option>
                                </select>

                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class="mb-1">Commnetaire</label>
                                <textarea name="comment" id="cmnt_edit" class="form-control" cols="30" rows="10"></textarea>

                        </div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Modifier</button>
                </div>
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


