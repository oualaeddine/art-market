<div class="modal fade" id="images-product" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action=""   id="form-images-product" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
                <h4 class="modal-title text-danger">Images </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row images-holder">

                </div>
                <input type="file" name="image" required class="form-control mt-2">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light ">Ajouter</button>
            </div>
            </form>
        </div>
    </div>
</div>