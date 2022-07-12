@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')
    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')

    @include('VendorsUi::Vendor.modals.users.delete')
    @include('VendorsUi::Vendor.modals.users.toggle')

{{-- <div class="row"> --}}
    <style>
        #vendor_users{
            max-width: 100% !important;
            width: 100% !important;
        }
    </style>

    <div class="card">
        <div class="card-header text-end">
           <a type="button" href="{{route('vendor.users.create')}}" class="btn btn-success waves-effect"  >Ajouter un utilisateur
           </a>
        </div>
        <div class="card-block table-border-style">
            <!-- Basic table -->
            <div class=" table-border-style table-responsive">
                <table class="table table-inverse" id="vendor_users">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Identifiant</th>
                        <th>Email</th>
                        <th>Téléphone</th>
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



    </div>


    @push('js')
        @include('layouts.extra.js.datatables')
        @include('layouts.extra.js.select2')

        <script>
            function ToggleUser(id){


                var url_change_delete_form = '{{ route("vendor.users.toggle",":user") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':user', id);

                $('#form-toggle-user').attr('action',url_change_delete_form );

            }
                $(document).ready(function () {
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
                            url : '{{route('vendor.users.index')}}',

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
                });

                function DeleteUser(id){


                    var url_change_delete_form = '{{ route("vendor.users.delete",":user") }}';

                    url_change_delete_form  =  url_change_delete_form .replace(':user', id);

                    $('#form-delete-vendor-user').attr('action',url_change_delete_form );

                }


        </script>

@endpush


@endsection
