@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')
    @include('layouts.extra.css.select2')
    <style>
        #vendor_images{
            max-width: 100% !important;
            width: 100% !important;
        }
    </style>
@endpush

@section('content')

    @include('partials.error.error')
    @include('VendorsUi::Vendor.modals.images.create')
    @include('VendorsUi::Vendor.modals.images.edit')
    @include('VendorsUi::Vendor.modals.images.delete')
    @include('VendorsUi::modals.image_modal')



    {{-- <div class="row"> --}}


    <div class="card">
        <div class="card-block table-border-style">
            <div class=" table-border-style table-responsive">
                <table class="table table-inverse" id="vendor_images">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Identifiant</th>
                        <th>Nom</th>
                        <th>Image en arabe</th>
                        <th>Image en français</th>
                        <th>Date de création</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>



    </div>


    @push('js')
        @include('layouts.extra.js.datatables')
        @include('layouts.extra.js.select2')

        <script>
            function showImg(img){
                $('#modal_image').attr('src',img);
                     }
                $(document).ready(function () {
                    $('.js-example-basic-single').select2({
                        placeholder: "Sélectionnez les catégories",
                        allowClear: true
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
                            url : '{{route('vendor.images.index')}}',

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
                });

                function EditVendorImage(id) {

                    var url_change_edit_form = '{{ route("vendor.images.update",":image") }}';

                    url_change_edit_form = url_change_edit_form.replace(':image', id);

                    $('#form-edit-vendor-image').attr('action', url_change_edit_form);


                    var url_update = '{{ route("vendor.images.get",":image") }}';

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


                function DeleteVendorImage(id){


                    var url_change_delete_form = '{{ route("vendor.images.delete",":image") }}';

                    url_change_delete_form  =  url_change_delete_form .replace(':image', id);

                    $('#form-delete-vendor-image').attr('action',url_change_delete_form );

                }


        </script>

@endpush


@endsection
