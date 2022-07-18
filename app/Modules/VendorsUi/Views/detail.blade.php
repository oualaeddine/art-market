@extends('layouts.master')
@push('css')

    @include('layouts.extra.css.datatables')

    @include('layouts.extra.css.select2')

@endpush


@section('content')

    @include('partials.error.error')
    @include('VendorsUi::modals.information')
    @include('VendorsUi::modals.image_modal')
{{--    @include('ClientsUi::modals.special.telephon')--}}
{{--    @include('ClientsUi::modals.special.ccp')--}}
    <style>
        .hiddenfile {
            width: 0px;
            height: 0px;
            overflow: hidden;
        }

        .label {
            text-transform: initial !important;
        }

        #vendor_users{
            max-width: 100% !important;
            width: 100% !important;
        }
        #vendor_images{
            max-width: 100% !important;
            width: 100% !important;
        }
        #vendors_raw_orders{
            max-width: 100% !important;
            width: 100% !important;
        }
        #vendor_orders{
            max-width: 100% !important;
            width: 100% !important;
        }
        #vendor_brands{
            max-width: 100% !important;
            width: 100% !important;
        }
        #vendor_products{
            max-width: 100% !important;
            width: 100% !important;
        }
        #vendor_categories{
            max-width: 100% !important;
            width: 100% !important;
        }
        #clients_contact_table{
            max-width: 100% !important;
            width: 100% !important;
        }
        #clients_profile_table{
            max-width: 100% !important;
            width: 100% !important;
        }
        #clients_phones_table{
            max-width: 100% !important;
            width: 100% !important;
        }
        #clients_pieces_table{
            max-width: 100% !important;
            width: 100% !important;
        }
    </style>


    <div class="row">
        <div class="col-xl-3 col-md-12">
            <div class="card sale-card">

                    <div class="card-block border-bottom text-center" style="position:relative;">

                        <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger">
                            <img id="preview-image-before-upload"  src="{{asset($vendor->logo_fr)}}" style="width:150px; height:150px;border-radius: 10px;max-height: 250px;">
                        </div>
                    </div>

                <div class="card-body border-bottom text-center text-dark" style="position: relative">



                    <h6 class="mb-4 mt-3">Les informations principales</h6>
                    <label data-bs-toggle="modal"
                           data-bs-target="#modals-edit_info_spec"
                           role="button" class="text-dark form-label label label-inverse-primary label-lg w-100 d-flex justify-content-between mb-2"><b class="font-weight-bold">Nom en français</b> {{$vendor->name_fr}}</label>

                    <label data-bs-toggle="modal"
                           data-bs-target="#modals-edit_info_spec"
                           role="button" class="text-dark form-label label label-inverse-primary label-lg w-100 d-flex justify-content-between mb-2"><b class="font-weight-bold">Nom en arabe</b>{{$vendor->name_ar}}</label>

                        <label data-bs-toggle="modal"
                       data-bs-target="#modals-edit_info_spec"
                           role="button" class="form-label badge badge-inverse-success">Voire plus</label>

                </div>



            </div>
        </div>

        <div class="col-xl-9 col-md-12">
            <div class="col-12">
                <div class="card feed-card">
                    <div class="card-block pt-0" id="nav-tab-2">
                        <ul class="nav nav-tabs md-tabs" id="nav-tab" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link active" data-bs-toggle="tab" href="#information" role="tab" aria-selected="true">Informations</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Users" role="tab" aria-selected="false">Utilisateurs</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Products" role="tab" aria-selected="false">Produits</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Brands" role="tab" aria-selected="false">Marques</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Categories" role="tab" aria-selected="false">Catégories</a>
                                <div class="slide"></div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#RawOrders" role="tab" aria-selected="false">Nouvelles commandes</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Orders" role="tab" aria-selected="false">Commandes confirmées</a>
                                <div class="slide"></div>
                            </li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content mt-2" >
                            <div class="tab-pane" id="information" role="tabpanel">
                                <div class="row">
                                    <div class="accordion col-md-12" id="accordionExample">
                                        <div class="accordion-item border-0" >

                                            <h5 class="accordion-header" id="headingOne">

                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    <i class="fa fa-image mx-2"></i> Images
                                                </button>
                                            </h5>

                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    @include('VendorsUi::sections.images')
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
{{--                                        <div class="accordion-item border-0">--}}

{{--                                            <h5 class="accordion-header" id="headingTwo">--}}
{{--                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
{{--                                                    <i class="fa fa-bars mx-2"></i> Form--}}
{{--                                                    <a class="waves-effect mx-2 text-success add-button" data-bs-toggle="modal"--}}
{{--                                                       data-bs-target="#modals-add-phone"><i class="fa fa-plus"></i></a>--}}
{{--                                                </button>--}}

{{--                                            </h5>--}}


{{--                                            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">--}}
{{--                                                <div class="accordion-body">--}}
{{--                                                    Form--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <hr>--}}
{{--                                        <div class="accordion-item border-0">--}}
{{--                                            <h5 class="accordion-header" id="headingThree">--}}
{{--                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--                                                    <i class="fa fa-id-card mx-2"></i> Pièces d'identités--}}
{{--                                                    <a class="waves-effect mx-2 text-success add-button" data-bs-toggle="modal"--}}
{{--                                                       data-bs-target="#modals-add-piece"><i class="fa fa-plus"></i></a>--}}
{{--                                                </button>--}}

{{--                                            </h5>--}}

{{--                                            <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">--}}
{{--                                                <div class="accordion-body">--}}
{{--                                                    @include('ClientsUi::sections.details.client_pieces')--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <hr>--}}
{{--                                        <div class="accordion-item border-0">--}}
{{--                                            <h5 class="accordion-header" id="headingFour">--}}

{{--                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">--}}
{{--                                                    <i class="fa fa-link mx-2"></i> Liens utiles--}}
{{--                                                    <a class="waves-effect mx-2 text-success add-button" data-bs-toggle="modal"--}}
{{--                                                       data-bs-target="#modals-add-contact-info"><i class="fa fa-plus"></i></a>--}}
{{--                                                </button>--}}

{{--                                            </h5>--}}
{{--                                            <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample">--}}
{{--                                                <div class="accordion-body">--}}
{{--                                                    @include('ClientsUi::sections.details.client_contact_info')--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <hr>--}}
{{--                                        <div class="accordion-item border-0" >--}}

{{--                                            <h5 class="accordion-header" id="headingFive">--}}

{{--                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">--}}
{{--                                                    <i class="fa fa-map-marker-alt mx-2"></i>  Adresses--}}
{{--                                                    <a class="waves-effect mx-2 text-success add-button" data-bs-toggle="modal"--}}
{{--                                                       data-bs-target="#modals-create-client-address"><i class="fa fa-plus"></i></a>--}}
{{--                                                </button>--}}

{{--                                            </h5>--}}


{{--                                            <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive" data-bs-parent="#accordionExample">--}}
{{--                                                <div class="accordion-body">--}}


{{--                                                    @include('ClientsUi::sections.details.client_address')--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>


                                </div>
                            </div>
                            <div class="tab-pane " id="Users" role="tabpanel">
                                <div class="row float-end">
                                    <a role="button"  class="w-auto  btn  btn-success  waves-effect mx-2"
                                       data-bs-toggle="modal"
                                       data-bs-target="#modals-add-vendor-user"

                                        href="javascript:void(0)"
                                    >Ajouter un utilisateur</a>
                                </div>

                                @include('VendorsUi::sections.users')


                            </div>

                            <div class="tab-pane" id="Products" role="tabpanel">
                                @include('VendorsUi::sections.product')
                            </div>
                            <div class="tab-pane" id="Brands" role="tabpanel">
                                <div class="row float-end">
                                    <a role="button"  class="w-auto  btn  btn-success  waves-effect mx-2"
                                       data-bs-toggle="modal"
                                       data-bs-target="#modals-vendor-sync-brands"

                                       href="javascript:void(0)"
                                    >Synchroniser les marques</a>
                                </div>

                                @include('VendorsUi::sections.brands')

                            </div>
                            <div class="tab-pane" id="Categories" role="tabpanel">
                                <div class="row float-end">
                                    <a role="button"  class="w-auto  btn  btn-success  waves-effect mx-2"
                                       data-bs-toggle="modal"
                                       data-bs-target="#modals-vendor-sync-categories"

                                       href="javascript:void(0)"
                                    >Synchroniser les catégories
                                    </a>
                                </div>

                                @include('VendorsUi::sections.categories')

                            </div>

                            <div class="tab-pane" id="RawOrders" role="tabpanel">
                                @include('VendorsUi::sections.raw')
                            </div>

                            <div class="tab-pane" id="Orders" role="tabpanel">
                                @include('VendorsUi::sections.orders')
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{--             User --}}
            @include('VendorsUi::modals.users.create')
            @include('VendorsUi::modals.users.edit')
            @include('VendorsUi::modals.users.delete')

            @include('VendorsUi::modals.images.edit')

            @include('VendorsUi::modals.categories.create')
            @include('VendorsUi::modals.categories.toggle')

            @include('VendorsUi::modals.brands.create')
            @include('VendorsUi::modals.brands.toggle')




        </div>
    </div>


    @push('js')
        @include('layouts.extra.js.datatables')
        @include('layouts.extra.js.select2')

        <script>
            function ToggleProduct(id){


                var url_change_delete_form = '{{ route("admin.vendors.products.toggle",":product") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':product', id);

                $('#form-toggle-product').attr('action',url_change_delete_form );

            }

            function ToggleBrand(id){


                var url_change_delete_form = '{{ route("admin.vendors.brands.toggle",":brand") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':brand', id);

                $('#form-toggle-brand').attr('action',url_change_delete_form );

            }

            function ToggleCategory(id){


                var url_change_delete_form = '{{ route("admin.vendors.categories.toggle",":category") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':category', id);

                $('#form-toggle-category').attr('action',url_change_delete_form );

            }

            function showImg(img){
                $('#modal_image').attr('src',img);
            }

            $(document).ready(function () {

                $('.js-example-basic-single4').select2({
                    placeholder: "Sélectionnez les rôles",
                    allowClear: true
                });

                $('.js-example-basic-single').select2({
                    placeholder: "Sélectionnez les categories",
                    allowClear: true
                });

                $('.brands-select').select2({
                    placeholder: "Sélectionnez les marques",
                    allowClear: true
                });


                $(".add-button").click(function (e){
                    var parent = $(this).parent().attr('data-bs-target');
                    setTimeout(
                        function() {
                            $(parent).collapse("show");
                        }, 500);

                });

                $('#nav-tab  a[href="'+window.location.hash+'"]').tab('show')

                $('#nav-tab-2').tabs({
                    activate: function (event, ui) {
                        $($.fn.dataTable.tables(true)).DataTable()
                            .columns.adjust()
                            .responsive.recalc();
                    },
                    create: function (event, ui) {
                        $($.fn.dataTable.tables(true)).DataTable()
                            .columns.adjust()
                            .responsive.recalc();
                    }
                });

                $('#vendor_orders').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    buttons: [
                    ],
                    ajax:{
                        url : '{{route('admin.vendors.detail',['vendor'=>$vendor->id,'type'=>'orders'])}}',
                    },
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'status', name: 'status'},
                        {data: 'updated_by', name: 'updated_by'},
                        {data: 'total', name: 'total'},
                        {data: 'address.commune.wilaya.name', name: 'address.commune.wilaya.name'},
                        {data: 'address.commune.name', name: 'address.commune.name'},
                        {data: 'address.address', name: 'address.address'},
                        {data: 'tracking_code', name: 'tracking_code'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'updated_at', name: 'updated_at'},
                        {data: 'details', name: 'details'},
                        {data: 'action', name: 'action'},
                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1},
                        {targets: 'no-sort', orderable: false}
                    ]
                });



                $('#vendors_raw_orders').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    buttons: [

                    ],
                    ajax:{
                        url : '{{route('admin.vendors.detail',['vendor'=>$vendor->id,'type'=>'raw_orders'])}}',

                    },
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'status', name: 'status'},
                        {data: 'wilaya', name: 'wilaya'},
                        {data: 'commune', name: 'commune'},
                        {data: 'total', name: 'total'},
                        {data: 'address', name: 'address'},
                        {data: 'tracking_code', name: 'tracking_code'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action'},
                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1},
                        {targets: 'no-sort', orderable: false}
                    ]
                });


                $('#vendor_users').DataTable({
                    dom: '<"top"f>rti<"bottom"lp><"clear">',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax: {
                        url : '{{route('admin.vendors.detail',['vendor'=>$vendor->id,'type'=>'users'])}}',

                    },
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'email', name: 'email'},
                        {data: 'phone', name: 'phone'},
                        {data: 'is_active', name: 'is_active'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action'},
                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1},
                        {targets: 'no-sort', orderable: false}
                    ]
                });


                $('#vendor_images').DataTable({
                    dom: '<"top"f>rti<"bottom"lp><"clear">',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax: {
                        url : '{{route('admin.vendors.detail',['vendor'=>$vendor->id,'type'=>'images'])}}',

                    },
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'image_ar', name: 'image_ar'},
                        {data: 'image_fr', name: 'image_fr'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action'},
                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1},
                        {targets: 'no-sort', orderable: false}
                    ]
                });

                $('#vendor_categories').DataTable({
                    dom: '<"top"f>rti<"bottom"lp><"clear">',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax: {
                        url : '{{route('admin.vendors.detail',['vendor'=>$vendor->id,'type'=>'categories'])}}',

                    },
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'category.name_fr', name: 'category.name_fr'},
                        {data: 'category.name_ar', name: 'category.name_ar'},
                        {data: 'is_active', name: 'is_active'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action'},
                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1},
                        {targets: 'no-sort', orderable: false}
                    ]
                });

                $('#vendor_brands').DataTable({
                    dom: '<"top"f>rti<"bottom"lp><"clear">',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax: {
                        url : '{{route('admin.vendors.detail',['vendor'=>$vendor->id,'type'=>'brands'])}}',

                    },
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'brand.name_fr', name: 'brand.name_fr'},
                        {data: 'brand.name_ar', name: 'brand.name_ar'},
                        {data: 'is_active', name: 'is_active'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action'},
                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1},
                        {targets: 'no-sort', orderable: false}
                    ]
                });


            });

            function DeleteVendorUser(id){


                var url_change_delete_form = '{{ route("admin.vendors.users.delete",":user") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':user', id);

                $('#form-delete-vendor-user').attr('action',url_change_delete_form );

            }

            function DeleteVendorImage(id){


                var url_change_delete_form = '{{ route("admin.vendors.images.delete",":image") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':image', id);

                $('#form-delete-vendor-image').attr('action',url_change_delete_form );

            }

            function EditVendorUser(id) {

                var url_change_edit_form = '{{ route("admin.vendors.users.update",":user") }}';

                url_change_edit_form = url_change_edit_form.replace(':user', id);

                $('#form-edit-vendor-user').attr('action', url_change_edit_form);


                var url_update = '{{ route("admin.vendors.users.get",":user") }}';

                url_update = url_update.replace(':user', id);


                $.ajax({
                    url: url_update,
                    type: 'GET', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },

                    error: function (error) {

                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function (data) {

                        $('#phone_user_edit').val(0+data.phone);
                        $('#email_user_edit').val(data.email);
                        $('#is_active_user_edit').val(data.is_active);
                        $('#vendor_user_roles_edit').val(data.roles).trigger('change');

                    }
                });

            }

            function EditVendorImage(id) {

                var url_change_edit_form = '{{ route("admin.vendors.images.update",":image") }}';

                url_change_edit_form = url_change_edit_form.replace(':image', id);

                $('#form-edit-vendor-image').attr('action', url_change_edit_form);


                var url_update = '{{ route("admin.vendors.images.get",":image") }}';

                url_update = url_update.replace(':image', id);


                $.ajax({
                    url: url_update,
                    type: 'GET', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },

                    error: function (error) {

                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function (data) {
                        console.log(data);
                        $('#vendor_image_name').val(data.name);

                    }
                });

            }
        </script>

    @endpush
    @push('js')
        @include('layouts.extra.js.select2')
        <script>


            $(document).ready(function () {

                $('.img_modal').on('click',function (){
                    console.log('dsf')
                })

                $('#image').change(function(){

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                    $('.visually-hidden').removeClass('visually-hidden')

                });

                $('#wilaya_id').on('change',function(){


                    $('#commune_id').val('');

                    var id = $(this).val();

                    var url_coumne = '{{ route("admin.clients.get.commune",":id") }}';

                    url_coumne = url_coumne.replace(':id', id);

                    $('#commune_id').select2({
                        /* placeholder: "Start typing ...", */
                        theme: 'bootstrap4',
                        ajax: {
                            url: url_coumne,
                            dataType: 'json',
                            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                            processResults: function(data) {
                                return {
                                    results: data
                                };
                            },

                        }
                    });

                })
            });
        </script>
    @endpush


    @push('js')




        <script>
            $(document).ready(function() {

                $('body').on('click','.btn-delete',function(){

                    var id = $(this).data('id')

                    $('.type-input').val($(this).data('type'))

                    var url_change = "{{ route('admin.vendors.products.delete.image', ':id') }}";

                    url_change= url_change.replace(':id', id);

                    $('#form-delete-image').attr('action', url_change);

                })

                $('body').on('click','.btn-edit',function(){

                    var id = $(this).data('id')

                    $('.type-input').val($(this).data('type'))

                    var url_change = "{{ route('admin.vendors.products.update.image', ':id') }}";

                    url_change = url_change.replace(':id', id);

                    $('#form-edit-image').attr('action', url_change);

                })

                $('#vendor_products').DataTable({
                    dom: 'Blfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax: {
                        url : '{{route('admin.vendors.detail',['vendor'=>$vendor->id,'type'=>'products'])}}',
                    },
                    columns: [{
                        data: 'responsive',
                        className: 'responsive'
                    },
                        {
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name_ar',
                            name: 'name_ar'
                        },
                        {
                            data: 'name_fr',
                            name: 'name_fr'
                        },
                        {
                            data: 'slug',
                            name: 'slug'
                        },
                        {
                            data: 'ref',
                            name: 'ref'
                        },
                        {
                            data: 'price_old',
                            name: 'price_old'
                        },
                        {
                            data: 'price',
                            name: 'price'
                        },  {
                            data: 'shipping',
                            name: 'shipping'
                        },
                        {
                            data: 'desc_ar',
                            name: 'desc_ar'
                        },
                        {
                            data: 'desc_fr',
                            name: 'desc_fr'
                        },
                        /*  {data: 'images', name: 'images'}, */
                        {
                            data: 'discount',
                            name: 'discount'
                        },
                        {
                            data: 'is_active',
                            name: 'is_active'
                        },  {
                            data: 'vendor',
                            name: 'vendor'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },

                    ],
                    buttons: [
                        {
                            text: 'Exporter tout',
                            className: 'visually-hidden',
                            action: function ( e, dt, button, config ) {
                                window.location = '/admin-dash/produits/export_all';
                            }
                        }
                    ],
                    columnDefs: [{
                        responsivePriority: 1,
                        targets: 0
                    },
                        {
                            responsivePriority: 2,
                            targets: -1
                        },
                        {
                            targets: 'no-sort',
                            orderable: false
                        }
                    ]
                });


            });

            function archiveOrder(id) {

                // to use for delete order modal
                var url_change_delete_form = '{{ route("admin.vendors.orders.delete",":id") }}';

                url_change_delete_form = url_change_delete_form.replace(':id', id);

                $('#form-delete-order').attr('action', url_change_delete_form);


            }

            function orderEdit(id){

                var url_change_edit_form = '{{ route("admin.vendors.orders.update",":id") }}';

                url_change_edit_form  =  url_change_edit_form .replace(':id', id);

                $('#form-edit-order').attr('action',url_change_edit_form );


                $('#status').val($('#edit-order'+id).data('status'));

                var id = id;

                var url_update = '{{ route("admin.vendors.orders.edit",":id") }}';

                url_update = url_update.replace(':id', id);


                $.ajax({
                    url: url_update,
                    type: 'GET', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },

                    error: function (error) {
                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function (data) {
                        var data = data.data;

                        $('#name-order-edit').val(data.name);
                        $('#details').text(data.details);

                        $('#product').val(data.product_id);
                        $('#product').trigger('change');

                    }
                });

            }


            function deleteProductVendor(id) {


                var url_change_delete_form = "{{ route('admin.vendors.products.delete', ':product') }}";

                url_change_delete_form = url_change_delete_form.replace(':product', id);

                $('#form-delete-product-vendor').attr('action', url_change_delete_form);

            }

            function ShowImagesVendor(id) {


                var url_change = "{{ route('admin.vendors.products.store-image', ':id') }}";

                url_change = url_change.replace(':id', id);

                $('#form-images-product-vendor').attr('action', url_change);


                var url_change_get = "{{ route('admin.vendors.products.get-image', ':id') }}";

                url_change_get = url_change_get.replace(':id', id);


                $.ajax({
                    url: url_change_get,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },

                    error: function(error) {
                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function(data) {
                        $('.images-holder').empty();
                        var data = data;

                        if (data.main_image != null) {

                            var url_img = window.location.origin + '/' + data.main_image;
                            var modal_delete = 'data-bs-toggle="modal" data-bs-target="#delete-image"'
                            var modal_edit = 'data-bs-toggle="modal" data-bs-target="#edit-image"'

                            var btn_delete = '<button type="button" class="btn btn-danger btn-delete mb-2"' + modal_delete +
                                ' data-id="' + id +
                                '" data-type="main">Supprimer</button> <button type="button" class="btn btn-info  btn-edit mb-2" '+modal_edit+' data-id="' +
                                id + '" data-type="main">Modifier</button>'

                            var img_one = '<div class="col-lg-4 col-sm-6 text-center ">' + btn_delete +
                                '<a href="' + url_img + '" target="_blank"><img src="' + url_img +
                                '" class="img-thumbnail rounded border-success" alt=""></a></div>';

                            $('.images-holder').append(img_one);
                        }

                        $.each(data.images, function(idx, elem) {

                            if (elem.image != null) {

                                var url_img = window.location.origin + '/' + elem.image;
                                var modal_delete = 'data-bs-toggle="modal" data-bs-target="#delete-image"'
                                var modal_edit = 'data-bs-toggle="modal" data-bs-target="#edit-image"'

                                var btn_delete =
                                    '<button type="button" class="btn btn-danger btn-delete mb-2" '+modal_delete+' data-id="' + elem.id +
                                    '" data-type="other">Supprimer</button> <button type="button" class="btn btn-info  btn-edit mb-2" '+modal_edit+' data-id="' +
                                    elem.id + '" data-type="other">Modifier</button>'
                                var img_one = '<div class="col-lg-4 col-sm-6">' + btn_delete + '<a href="' +
                                    url_img + '" target="_blank"><img src="' + url_img +
                                    '" class="img-thumbnail rounded" alt=""></a></div>';

                                $('.images-holder').append(img_one);
                            }

                        });


                    }
                });




            }
        </script>

    @endpush
@endsection
