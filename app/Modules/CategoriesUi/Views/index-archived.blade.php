@extends('layouts.master')

@push('css')
@include('layouts.extra.css.datatables')


@endpush

@section('content')

    @include('partials.error.error')
    @include('CategoriesUi::modals.delete')
    @include('CategoriesUi::modals.restore')


    <div class="card">
        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="categories_table">
                <thead>
                <tr>
                    <th></th>
                    <th>Identifiant</th>
                    <th>Nom en ar</th>
                    <th>Nom en fr</th>
                    <th>Icon</th>
                    <th>Actif</th>
                    <th>Date de création</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>

            </table>

        </div>

    </div>


    @push('js')
        @include('layouts.extra.js.datatables')



        <script>

            $(document).ready(function () {
                $('#categories_table').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax:{
                        url : '{{route('admin.categories.archived')}}',
                    },
                    buttons: [
                        // {
                        //     extend: 'excel',
                        //     text:'Exporter .xls',
                        //     className: 'btn block btn-success rounded m-r-30 visually-hidden',
                        //     exportOptions: {
                        //         columns: [1,2,3,5,6]
                        //     },
                        //     init: function(api, node, config) {
                        //         $(node).removeClass('dt-button')
                        //     }
                        // },
                    ],
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name_ar', name: 'name_ar'},
                        {data: 'name_fr', name: 'name_fr'},
                        {data: 'icon', name: 'icon'},
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


            function RestoreCategories(id){

                var url_change_delete_form = '{{ route("admin.categories.restore",":category") }}';

                url_change_delete_form = url_change_delete_form.replace(':category', id);

                $('#form-restore-category').attr('action', url_change_delete_form);

            }


        </script>

    @endpush

@endsection
