@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')

    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')
{{--    @include('UsersUi::Permission.models.create')--}}
    @include('UsersUi::Permission.models.delete')
{{--    @include('UsersUi::Permission.models.edit')--}}

    <div class="card">
        <div class="card-header text-end">
{{--            <button type="button" class="btn btn-success waves-effect mb-2" data-bs-toggle="modal"--}}
{{--                    data-bs-target="#modals-add-permission"> Ajouter une Permission--}}
{{--            </button>--}}
        </div>
        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="permissions_table">
                <thead>
                <tr>
                    <th></th>
                    <th> identifiant</th>
                    <th> Nom</th>
                    <th> Date de création</th>
{{--                    <th> Actions</th>--}}
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

                $('#permissions_table').DataTable({
                    dom: '<"top"f>rti<"bottom"lp><"clear">',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax: {
                        url: '{{route('admin.permissions.index')}}',
                    },
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'created_at', name: 'created_at'},
                        // {data: 'action', name: 'action'},
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


            {{--function deletePermission(id) {--}}


            {{--    var url_change_delete_form = '{{ route("admin.permissions.delete",":permission") }}';--}}

            {{--    url_change_delete_form = url_change_delete_form.replace(':permission', id);--}}

            {{--    $('#form-delete-permission').attr('action', url_change_delete_form);--}}

            {{--}--}}



        </script>

    @endpush


@endsection

