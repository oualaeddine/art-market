<div class="modal fade" id="modal-add_root_cat" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" id="form-add_root_cat" action="{{ route("admin.categories.store.node") }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une catégorie</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3 row">
                        <label class="form-label col-sm-2 col-form-label">Nom en français</label>
                        <div class="col-sm-10">
                            <input  value="{{old('name_fr')}}" type="text" class="form-control" id="name_fr" name="name_fr"
                                    placeholder="Nom en français">
                            <span class="messages"></span>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="form-label col-sm-2 col-form-label">الاسم (باللغة العربية)</label>
                        <div class="col-sm-10">
                            <input  dir="rtl" value="{{old('name_ar')}}" type="text" class="form-control" id="name_ar" name="name_ar"
                                    placeholder="الاسم">
                            <span class="messages"></span>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="form-label col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input  dir="ltr" value="{{old('name_ar')}}" type="file" class="form-control" name="image">
                            <span class="messages"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" >Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
