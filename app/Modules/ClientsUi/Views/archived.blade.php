@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')
    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')
    @include('ClientsUi::modals.delete')
    @include('ClientsUi::modals.restore')


    <div class="card">
        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="clients_archived_table">
                <thead>
                <tr>
                    <th></th>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Wilaya</th>
                    <th>Commune</th>
                    <th>Téléphone principal </th>
                    <th>Date de création</th>
                    <th>Actions</th>
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

                $('#clients_archived_table').DataTable({
                    dom: 'Blfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax:{
                        url : '/cod-dash/clients/archived',
                        cache: false
                    },
                    buttons: [
                    ],
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'first_name', name: 'first_name'},
                        {data: 'last_name', name: 'last_name'},
                        {data: 'wilaya', name: 'wilaya'},
                        {data: 'commune', name: 'commune'},
                        {data: 'phone', name: 'phone'},
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

            function DeleteClient(id){

                var url_change_delete_form = '{{ route("admin.clients.delete",":client") }}';

                url_change_delete_form = url_change_delete_form.replace(':client', id);

                $('#form-delete-client').attr('action', url_change_delete_form);

            }
            function RestoreClient(id){

                var url_change_delete_form = '{{ route("admin.clients.restore",":client") }}';

                url_change_delete_form = url_change_delete_form.replace(':client', id);

                $('#form-restore-client').attr('action', url_change_delete_form);

            }


        </script>

    @endpush


@endsection

