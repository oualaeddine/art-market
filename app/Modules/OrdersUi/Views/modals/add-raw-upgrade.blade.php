
<div class="modal fade" id="modals-add-raw-product"  role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action="{{route('admin.orders.raw.upgrade.product-add',['order'=>$order->id])}}"
                  method="POST" >
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un produit</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="x">{{__('Produit')}}</label>
                                    <select style="width: 100%!important" id="product_id" required name="product_id"
                                            class="form-control input-lg">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="x">{{__('Quanitite')}}</label>
                                    <input type="number" name="qty" class="form-control" min="1" value="1">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
