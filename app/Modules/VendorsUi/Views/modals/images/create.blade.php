<div class="modal fade" id="modals-add-vendor-image" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" enctype="multipart/form-data"  action="{{route('admin.vendors.images.store',['vendor'=>$vendor->id])}}"

                  method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une image</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label class="mb-1">Nom</label>
                                <input
                                    type="text"
                                    class="form-control mt-1"
                                    id=""
                                    readonly
                                    aria-label=""
                                />
                            </div>

                            <div class="form-group col-sm-12 col-md-4">
                                <label class=" mb-1">Image</label> <b class="text-danger">*</b>
                                <input required type="file"  name="image_fr"  class="form-control">
                            </div>

                            <div class="form-group col-sm-12 col-md-4 text-end">
                                <label class=" mb-1">الصورة</label> <b class="text-danger">*</b>
                                <input required type="file"  name="image_ar"  dir="rtl" class="form-control">
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
<style>
    .card .card-header h5:after {

        display: none !important;

    }
</style>


