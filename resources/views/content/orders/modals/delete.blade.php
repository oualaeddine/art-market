<div class="modal fade" id="archive-order" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="form-delete-order" method="POST">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Supprimer une commande</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>êtes-vous sûr de supprimer cette commande ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light ">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>
