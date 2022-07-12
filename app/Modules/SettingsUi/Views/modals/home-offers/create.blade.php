<div class="modal fade" id="modals-add-prod" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action="{{route('admin.home-offers.store')}}"
                  enctype="multipart/form-data"
                  method="POST" id="product-form">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un produit</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="x">{{__('Produit')}}</label>
                            <select style="width: 100%!important" id="product_id" required name="product_id" class="form-control input-lg">

                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
