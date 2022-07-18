<div class="modal fade" id="modals-add-role" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action="{{route('admin.roles.store')}}"
                  method="POST" id="product-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un rôle</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card">

                        <div class="card-header">

                            <div class="row">
                                <h5>Nom de rôle :</h5>
                                <div class="card-block mt-1">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <input
                                                type="text"
                                                class="form-control "
                                                id="name"
                                                name="name"


                                                required
                                            />
                                        </div>

                                    </div>

                                </div>

                            </div>

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
