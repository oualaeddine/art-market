<div class="modal fade" id="edit-image" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="form-edit-image" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="modal-header">
                <h4 class="modal-title text-danger">Modifier un image</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="type"  class="form-control mt-2 type-input">
                <input type="file" name="image" required class="form-control mt-2">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light ">Enregistrer les modifications</button>
            </div>
            </form>
        </div>
    </div>
</div>