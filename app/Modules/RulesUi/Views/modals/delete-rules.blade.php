<div class="modal fade" id="delete-rule" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="form-delete-rule" method="POST">
                @csrf
                @method('delete')
            <div class="modal-header">
                <h4 class="modal-title text-danger">Supprimer une regle</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>êtes-vous sûr de supprimer cette regle ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Non</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light ">Oui</button>
            </div>
            </form>
        </div>
    </div>
</div>
