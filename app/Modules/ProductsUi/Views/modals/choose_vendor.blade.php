
<div class="modal fade" id="modals-slide-in-vendor-select" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form  class="add-new-record modal-content pt-0"  action="{{route('admin.products.create')}}"
                 >
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">
                        Sélectionné un vendeur </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="form-group col-12">
                        {{-- <div class="container"> --}}
                           {{--  <h4 class="sub-title">Statut</h4> --}}
                            <label class="form-label" for="status">Vendeur <b class="text-danger">*</b></label>
                            <select name="vendor_id" id="vendor_id" class="form-control form-control-info fill" required>
                                <option selected disabled value="">Sélectionné un vendeur</option>
                                @foreach($vendors as $vendor)
                                    <option value="{{$vendor->id}}">{{$vendor->name_fr.' | '.$vendor->name_ar}}</option>
                                @endforeach
                            </select>
                        {{-- </div> --}}

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Continuez</button>
                </div>
            </form>
        </div>
    </div>
</div>
