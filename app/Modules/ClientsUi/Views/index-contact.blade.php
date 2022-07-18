@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')
    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')
    @include('ClientsUi::modals.contact.delete')
    @include('ClientsUi::modals.contact.edit')


    <div class="card">

        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="contacts_table">
                <thead>
                <tr>
                    <th></th>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Message</th>
                    <th>Statut</th>
                    <th >Commnetaire</th>
                    <th>Date de création</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>


            </table>

        </div>
        <div class="card-footer text-start">

            <a href="{{route('admin.contacts.archived')}}" class="btn btn-danger waves-effect mb-2"> Contacts archivés
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

                $('#contacts_table').DataTable({
                    dom: '<"top"f>rti<"bottom"lp><"clear">',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax:{
                        url : '/admin-dash/contacts',
                        cache: false
                    },
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'message', name: 'message'},
                        {data: 'status', name: 'status'},
                        {data: 'comment', name: 'comment',className:"text-truncate"},
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

            function DeleteContact(id){

                var url_change_delete_form = '{{ route("admin.contacts.delete",":contact") }}';

                url_change_delete_form = url_change_delete_form.replace(':contact', id);

                $('#form-delete-contact').attr('action', url_change_delete_form);

            }


            function EditContact(id) {

                var url_change_edit_form = '{{ route("admin.contacts.update",":contact") }}';

                url_change_edit_form = url_change_edit_form.replace(':contact', id);

                $('#form-edit-contact').attr('action', url_change_edit_form);


                var id = id;

                var url_update = '{{ route("admin.contacts.edit",":contact") }}';

                url_update = url_update.replace(':contact', id);
                /*   console.log(id) */

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

                        $('#status_edit').val(data.status);
                        $('#cmnt_edit').val(data.cmnt);

                    }
                });

            }

        </script>

    @endpush


@endsection

