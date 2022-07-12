@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')
    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')

    @include('VendorsUi::Vendor.modals.clients.create')
    @include('VendorsUi::Vendor.modals.clients.delete')

{{-- <div class="row"> --}}


    <div class="card">
        <div class="card-header text-end">
            <a role="button"  class="w-auto  btn  btn-success  waves-effect mx-2"
               data-bs-toggle="modal"
               data-bs-target="#modals-vendor-add_client"

               href="javascript:void(0)"
            >Ajouter un client
            </a>
        </div>
        <div class="card-block table-border-style">
            <!-- Basic table -->
                            <table class="table table-inverse" id="vendor_clients_table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th> identifiant </th>
                                    <th> Nom  </th>
                                    <th> Prénom </th>
                                    <th> Téléphone </th>
                                    <th> Date de création</th>
                                    <th> Actions </th>
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
                    $('#vendor_clients_table').DataTable({
                        dom: 'Bfrtip',
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        /* paging: false, */
                        language: {
                            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                        },
                        ajax:{
                            url : '{{route('vendor.clients.index')}}',
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
                            {data: 'last_name', name: 'last_name'},
                            {data: 'first_name', name: 'first_name'},
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

                function DeleteVendorClient(id){


                var url_change_delete_form = '{{ route("vendor.clients.delete",":clients_vendor") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':clients_vendor', id);

                $('#form-delete-vendor-client').attr('action',url_change_delete_form );

                }

                $('#client_id').select2({
                    placeholder: "écrire...",
                    theme: 'bootstrap4',
                    delay: 200,
                    minimumInputLength: 4,
                    ajax: {
                        url: '{{route('vendor.orders.get.clients')}}',
                        dataType: 'json',
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },
                    }
                });
        </script>

@endpush


@endsection
