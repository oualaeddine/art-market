<div class="modal fade" id="restore-order_raw" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="form-restore-order" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title text-success">Restaurer une commande</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>êtes-vous sûr de restaurer cette commande ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light ">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>
