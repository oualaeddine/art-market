<div class="modal fade" id="modals-edit_info_spec" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action="{{route('admin.vendors.update',['vendor'=>$vendor->id])}}"
                  enctype="multipart/form-data"
                  method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Modifier les informations principales</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="mb-1">Nom en francais</label> <b class="text-danger">*</b>
                                <input
                                    type="text"
                                    value="{{$vendor->name_fr}}"
                                    class="form-control mt-1"
                                    id="name_fr"
                                    name="name_fr"
                                    placeholder=""
                                    aria-label=""
                                    required
                                />
                            </div>
                            <div class="form-group col-sm-12 col-md-6 text-end">
                                <label class=" mb-1 ">الاسم بالعربي</label> <b class="text-danger">*</b>
                                <input
                                    dir="rtl"
                                    type="text"
                                    class="form-control mt-1"
                                    value="{{$vendor->name_ar}}"
                                    id="name_ar"
                                    name="name_ar"
                                    placeholder=""
                                    aria-label=""
                                    required
                                />
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="mb-1">brève description</label> <b class="text-danger">*</b>
                                <textarea required class="form-control" name="short_dec_fr" id="" cols="30"
                                          rows="2">{{$vendor->short_dec_fr}}</textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 text-end">
                                <label class=" mb-1 "> <b class="text-danger">*</b>وصف قصير</label>
                                <textarea dir="rtl" required class="form-control" name="short_dec_ar" id="" cols="30"
                                          rows="2">{{$vendor->short_dec_ar}}</textarea>
                            </div>

                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="form-group col-sm-12 col-md-6">--}}
{{--                                <label class="mb-1">Description</label> <b class="text-danger">*</b>--}}
{{--                                <textarea required class="form-control" name="desc_fr" id="" cols="30"--}}
{{--                                          rows="4">{{$vendor->desc_fr}}</textarea>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-sm-12 col-md-6 text-end">--}}
{{--                                <label class=" mb-1 "> <b class="text-danger">*</b>وصف</label>--}}
{{--                                <textarea dir="rtl" required class="form-control" name="desc_ar" id="" cols="30"--}}
{{--                                          rows="4">{{$vendor->desc_ar}}</textarea>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                        <div class="row">
                            <div class="form-group col-sm-12 ">
                                <label class="mb-1">Logo</label>
                                <input  type="file" name="logo_fr" class="form-control">
                                <span><a target="_blank"  href="{{asset($vendor->logo_fr)}}">voir</a></span>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Modifier</button>
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


