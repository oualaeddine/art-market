<div class="modal fade" id="modals-vendor-sync-brands" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0"   action="{{route('vendor.brands.sync')}}"
                  method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Sync marqs</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="category">Marques</label> <b class="text-danger">*</b>

                                <select style="width: 100%!important;" class="brands-select col-sm-12 " id="marque" name="brands[]" multiple="multiple">

                                    @foreach($brands as $brand)
                                        <option {{in_array($brand->id,$selected_brands)?'selected':''}} value="{{$brand->id}}">{{$brand->name_fr}}</option>
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


