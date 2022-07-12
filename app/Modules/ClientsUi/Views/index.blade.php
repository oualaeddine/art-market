@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')
    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')
    @include('ClientsUi::modals.archive')


    <div class="card">
        <div class="card-header text-end">
            <a href="javascript:void(0)" onclick="$('.buttons-excel').click()" class="btn  btn-secondary waves-effect mb-2"> Exporter .xls</a>

            <a href="{{route('admin.clients.create')}}" class="btn btn-success waves-effect mb-2"> Ajouter un client
            </a>


{{--            <a href="{{route('admin.clients.special',['client'=>1])}}" class="btn btn-info waves-effect mb-2"> Client--}}
{{--            </a>--}}
        </div>
        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="clients_table">
                <thead>
                <tr>
                    <th></th>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Wilaya</th>
                    <th>Commune</th>
                    <th>Téléphone </th>
                    <th>Email </th>
                    <th>Date de création</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>


            </table>

        </div>

        <div class="card-footer text-start">

                <a href="{{route('admin.clients.archived')}}" class="btn btn-danger waves-effect mb-2"> Clients archivés
                </a>
        </div>

    </div>

    {{--
    </div> --}}

    @push('js')
        @include('layouts.extra.js.datatables')
        @include('layouts.extra.js.select2')

        <script>

            $(document).ready(function () {

                $('#clients_table').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    "order":[[1, 'desc']],
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax:{
                        url : '/cod-dash/clients',
                        cache: false
                    },
                    buttons: [
                        {
                            extend: 'excel',
                            text:'Exporter .xls',
                            className: 'btn block btn-success rounded m-r-30 visually-hidden',
                            exportOptions: {
                                columns: [ 1,2,3,4,5,6,7,8]
                            },
                            init: function(api, node, config) {
                                $(node).removeClass('dt-button')
                            }
                        },
                    ],
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'first_name', name: 'first_name'},
                        {data: 'last_name', name: 'last_name'},
                        {data: 'wilaya', name: 'wilaya'},
                        {data: 'commune', name: 'commune'},
                        {data: 'phone', name: 'phone'},
                        {data: 'email', name: 'email'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action'},
                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1},
                        {targets: 'no-sort', orderable: true}
                    ]
                });

            });

            function DeleteClient(id){

                var url_change_delete_form = '{{ route("admin.clients.delete",":client") }}';

                url_change_delete_form = url_change_delete_form.replace(':client', id);

                $('#form-delete-client').attr('action', url_change_delete_form);

            }
            function archiveClient(id){

                var url_change_delete_form = '{{ route("admin.clients.archive",":client") }}';

                url_change_delete_form = url_change_delete_form.replace(':client', id);

                $('#form-archive-client').attr('action', url_change_delete_form);

            }


        </script>

    @endpush


@endsection

