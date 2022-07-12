
@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')

    @include('layouts.extra.css.select2')

    <style>
        /*.select2-results__option[aria-selected=true] {*/
        /*    display: none;*/
        /*}*/
        .select2-results__option--selected { 	display: none; }
    </style>
@endpush

@section('content')

    @include('partials.error.error')
    @include('UsersUi::Roles.models.create')
    @include('UsersUi::Roles.models.delete')
    @include('UsersUi::Roles.models.edit')

    <div class="card">
        <div class="card-header text-end">
            <button type="button" class="btn btn-success waves-effect mb-2" data-bs-toggle="modal"
                    data-bs-target="#modals-add-role"> Ajouter un rôle
            </button>
        </div>
        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="roles_table">
                <thead>
                <tr>
                    <th></th>
                    <th> identifiant</th>
                    <th> Nom</th>
                    <th> Permissions</th>
                    <th> Date de création</th>
                    <th> Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>

            </table>

        </div>

    </div>



    @push('js')
        @include('layouts.extra.js.datatables')

        @include('layouts.extra.js.select2')

        <script>

            $(document).ready(function () {

                $('#roles_table').DataTable({
                    dom: '<"top"f>rti<"bottom"lp><"clear">',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax: {
                        url: '{{route('admin.roles.index')}}',
                    },
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'permissions', name: 'permissions'},
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


            // $(document).ready(function () {
            //     $('.js-example-basic-single').select2({
            //         placeholder: "Sélectionnez les Roles",
            //         allowClear: true
            //     });
            //     $('.roles_select_edit').select2({
            //         placeholder: "Sélectionnez les Roles",
            //         allowClear: true
            //     });
            // });


            function deleteRole(id) {


                var url_change_delete_form = '{{ route("admin.roles.delete",":role") }}';

                url_change_delete_form = url_change_delete_form.replace(':role', id);

                $('#form-delete-role').attr('action', url_change_delete_form);

            }

            function roleEdit(id) {

                var url_change_edit_form = '{{ route("admin.roles.update",":role") }}';

                url_change_edit_form = url_change_edit_form.replace(':role', id);

                $('#form-edit-role').attr('action', url_change_edit_form);


                var id = id;

                var url_update = '{{ route("admin.roles.edit",":role") }}';

                url_update = url_update.replace(':role', id);

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
                        $('#name_edit').val(data.name);

                        $('#permission_edit').val(data.perms);
                        $('#permission_edit').trigger('change');


                    }
                });


            }

        </script>

    @endpush


@endsection

