<div class="modal fade" id="modals-vendor-sync-categories" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0"   action="{{route('admin.vendors.categories.sync',['vendor'=>$vendor->id])}}"

                  method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Synchroniser les catégories</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="category">Catégories</label> <b class="text-danger">*</b>

                                <select style="width: 100%!important;" class="js-example-basic-single col-sm-12 select2-hidden-accessible" id="category" name="categories[]" multiple="multiple">

                                    @foreach($categories as $category)
                                        <option {{in_array($category->id,$selected_categories)?'selected':''}} value="{{$category->id}}">{{$category->name_fr}}</option>
                                    @endforeach

                                </select>
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


