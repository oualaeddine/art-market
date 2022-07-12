@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')
    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')


    {{-- <div class="row"> --}}


    <div class="card">
        <div class="card-header text-end">
            <button type="button" class="btn btn-success waves-effect" data-bs-toggle="modal"
                    data-bs-target="#modals-add-brand"> Ajouter une marque
            </button>
            @include('BrandsUi::modals.brand.create')
            @include('BrandsUi::modals.brand.toggle')
            @include('BrandsUi::modals.brand.edit')
            @include('BrandsUi::modals.brand.delete')
            @include('VendorsUi::modals.image_modal')

        </div>
        <div class="card-block table-border-style">
            <table class="table table-inverse" id="brands_table">
                <thead>
                <tr>
                    <th></th>
                    <th> identifiant</th>
                    <th> Nom en français</th>
                    <th> Nom en arabe</th>
                    <th> Image</th>
                    <th> Actif</th>
                    <th> Date de création</th>
                    <th> Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>


        </div>

        <div class="card-footer text-start">

            <a href="{{route('admin.brands.archived')}}" type="button" class="btn btn-danger waves-effect"  >Marques archivé </a>
        </div>
    </div>


    @push('js')
        @include('layouts.extra.js.datatables')
        @include('layouts.extra.js.select2')

        <script>
            function showImg(img) {
                $('#modal_image').attr('src', img);
            }

            function ToggleBrand(id){


                var url_change_delete_form = '{{ route("admin.brands.toggle",":brand") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':brand', id);

                $('#form-toggle-brand').attr('action',url_change_delete_form );

            }
            $(document).ready(function () {
                $('#brands_table').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax: {
                        url: '/cod-dash/marques',
                    },
                    buttons: [
                        // {
                        //     extend: 'excel',
                        //     text:'Exporter .xls',
                        //     className: 'btn block btn-success rounded m-r-30',
                        //     exportOptions: {
                        //         columns: [1,2,3,5]
                        //     },
                        //     init: function(api, node, config) {
                        //         $(node).removeClass('dt-button')
                        //     }
                        // },
                    ],
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name_fr', name: 'name_fr'},
                        {data: 'name_ar', name: 'name_ar'},
                        {data: 'image', name: 'image'},
                        {data: 'is_active', name: 'is_active'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action'},
                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: 1},
                        {targets: 'no-sort', orderable: false}
                    ]
                });


            });

            function deleteBrand(id) {


                var url_change_delete_form = '{{ route("admin.brands.delete",":id") }}';

                url_change_delete_form = url_change_delete_form.replace(':id', id);

                $('#form-delete-brand').attr('action', url_change_delete_form);

            }

            function BrandEdit(id) {

                var url_change_edit_form = '{{ route("admin.brands.update",":id") }}';

                url_change_edit_form = url_change_edit_form.replace(':id', id);

                $('#form-edit-brand').attr('action', url_change_edit_form);


                var id = id;

                var url_update = '{{ route("admin.brands.edit",":id") }}';

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

                        var data = data;

                        $('#name_fr_edit').val(data.name_fr);
                        $('#name_ar_edit').val(data.name_ar);
                    }
                });


            }

        </script>

    @endpush


@endsection
