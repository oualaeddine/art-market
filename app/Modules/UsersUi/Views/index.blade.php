@extends('layouts.master')
@push('css')

    @include('layouts.extra.css.datatables')

    @include('layouts.extra.css.select2')


    <style>

        .card .card-header h5:after {
            display: none !important;
        }

        .select2-selection__choice {
            background-color: #5897fb !important;
            border: none !important;
        }

        .select2-selection__choice__remove {
            color: white !important;
        }

        .select2-selection__choice__remove:hover {
            background: darkblue !important;
        }

        /*   .select2-container--default .select2-results__option--highlighted[aria-selected] {
          background-color: #5897fb !important;
          color: black;
          } */


    </style>


@endpush
@section('content')

    @include('content.users.models.create')
    @include('content.users.models.edit')
    @include('content.users.models.delete')
    @include('content.users.models.archive')
    @include('content.users.models.unarchive')
    @include('content.users.models.block')
    @include('content.users.models.unblock')
    {{-- <div class="row"> --}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-end">
            <a href="javascript:void(0)" onclick="$('.buttons-excel').click()" class="btn  btn-secondary waves-effect mb-2"> Exporter .xls</a>
            <button type="button" class="btn btn-success waves-effect mb-2" data-bs-toggle="modal"
                    data-bs-target="#modals-add-user"> Ajouter un utilisateur
            </button>
        </div>
        <div class="card-block table-border-style table-responsive">
            <!-- Basic table -->
            {{-- <section id="basic-datatable"> --}}
            {{--  <div class="row">
                 <div class="col-12">
                     <div class="card"> --}}
            <table class="table table-inverse" id="users_table">
                <thead>
                <tr>
                    <th></th>
                    <th> identifiant</th>
                    <th> Nom</th>
                    <th> Email</th>
                    <th> Rôle</th>
                    <th> Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>

    {{--
    </div> --}}

    @push('js')
        @include('layouts.extra.js.datatables')
        @include('layouts.extra.js.select2')




        <script>

            $(document).ready(function () {

                $(document).ready(function () {
                    $('.js-example-basic-single').select2({
                        placeholder: "Sélectionnez les rôles",
                        allowClear: true
                    });
                    $('.roles_select_edit').select2({
                        placeholder: "Sélectionnez les rôles",
                        allowClear: true
                    });
                });


                $('#users_table').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax: "{{ route('admin.users.index') }}",
                    buttons: [
                        {
                            extend: 'excel',
                            text: 'Exporter .xls',
                            className: 'btn block btn-success rounded m-r-30 visually-hidden',
                            exportOptions: {
                                columns: [1, 2, 3]
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('dt-button')
                            }
                        },
                    ],
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'roles', name: 'roles'},
                        {data: 'action', name: 'action'},

                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: 1},
                        {targets: 'no-sort', orderable: false}
                    ]
                });


            });


            function archiveUser(id) {


                var url_change_delete_form = '{{ route("admin.users.archive",":user") }}';

                url_change_delete_form = url_change_delete_form.replace(':user', id);

                $('#form-archive-user').attr('action', url_change_delete_form);

            }

            function unarchiveUser(id) {


                var url_change_delete_form = '{{ route("admin.users.unarchive",":user") }}';

                url_change_delete_form = url_change_delete_form.replace(':user', id);

                $('#form-unarchive-user').attr('action', url_change_delete_form);

            }

            function blockUser(id) {


                var url_change_delete_form = '{{ route("admin.users.block",":user") }}';

                url_change_delete_form = url_change_delete_form.replace(':user', id);

                $('#form-block-user').attr('action', url_change_delete_form);

            }


            function unblockUser(id) {


                var url_change_delete_form = '{{ route("admin.users.unblock",":user") }}';

                url_change_delete_form = url_change_delete_form.replace(':user', id);

                $('#form-unblock-user').attr('action', url_change_delete_form);

            }

            function deleteUser(id) {


                var url_change_delete_form = '{{ route("admin.users.delete",":id") }}';

                url_change_delete_form = url_change_delete_form.replace(':id', id);

                $('#form-delete-user').attr('action', url_change_delete_form);

            }

            function userEdit(id) {

                var url_change_edit_form = '{{ route("admin.users.update",":id") }}';

                url_change_edit_form = url_change_edit_form.replace(':id', id);

                $('#form-edit-user').attr('action', url_change_edit_form);


                var id = id;

                var url_update = '{{ route("admin.users.edit",":id") }}';

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
                        console.log(data);
                        var list_roles = data.list_roles;
                        var data = data;


                        $('#name_edit').val(data.name);
                        $('#email_edit').val(data.email);


                        // $(".select-category-edit").select2({width: '100%'});

                        $('.roles_select_edit').val(list_roles);
                        $('.roles_select_edit').trigger('change');

                    }
                });


            }

        </script>

    @endpush


@endsection
