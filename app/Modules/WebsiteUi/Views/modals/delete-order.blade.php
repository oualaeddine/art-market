<div class="modal fade" id="modals-order" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="form-order" method="POST">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h4 class="modal-title text-danger">{{__('Supprimer un commande')}}</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <p>{{__('êtes-vous sûr de supprimer cette commande')}} ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('Non')}}</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light ">{{__('Oui')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
