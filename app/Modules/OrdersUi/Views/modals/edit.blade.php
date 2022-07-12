
<div class="modal fade" id="modals-slide-in-product-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" id="form-edit-order" action=""
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="modal-header">
                    <h4 class="modal-title">Modifier une commande</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="form-group col-6">
                        {{-- <div class="container"> --}}
                           {{--  <h4 class="sub-title">Statut</h4> --}}
                            <label class="form-label" for="status">Statut <b class="text-danger">*</b></label>
                            <select name="status" id="status" class="form-control form-control-info fill" required>
                                <option value="" disabled selected>Sélectionnez un statut</option>
                                <option value="confirmed">confirmé</option>
                                <option value="canceled">annulé</option>
                                <option value="completed">terminé</option>
                                <option value="pending">en attente</option>
                            </select>
                        {{-- </div> --}}

                        </div>

                        <div class="form-group col-6">
                            <label class="form-label" for="details">Remarque</label>
                            <textarea
                                    type="text"
                                    class="form-control "
                                    id="details"
                                    name="details"
                                    placeholder="Remarque"
                                    aria-label="Remarque"
                                    cols="20" rows="3"
                                   
                            ></textarea>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Sauvegarder les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>
