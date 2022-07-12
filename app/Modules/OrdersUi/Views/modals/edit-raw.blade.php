
<div class="modal fade" id="modals-slide-in-product-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" id="form-edit-order" action=""
                  method="POST">
                @csrf
                @method('put')

                <div class="modal-header">
                    <h4 class="modal-title text-success">Confirmer  une commande</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>êtes-vous sûr de confirmer  une commande ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light ">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>
