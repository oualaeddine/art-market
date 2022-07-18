<div class="modal fade" id="archive-user" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="form-archive-user" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-header">
                <h4 class="modal-title text-danger">Archiver un Utilisateur</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>êtes-vous sûr de archiver cette Utilisateur ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Non</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light ">Oui</button>
            </div>
            </form>
        </div>
    </div>
</div>
