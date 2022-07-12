@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')
    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')
    @include('VendorsUi::Vendor.modals.orders.normal.delete')
    @include('VendorsUi::Vendor.modals.orders.normal.edit')




    {{-- <div class="row"> --}}
    <style>
        #vendor_orders{
            max-width: 100% !important;
            width: 100% !important;
        }
    </style>
    <div class="card">
        <div class="card-block table-border-style">
            <div class="card-header text-end">

                <a href="{{route('vendor.orders.create')}}" class="btn btn-success waves-effect mb-2"> Ajouter une commande</a>
            </div>
            <div class=" table-border-style table-responsive">
                <table class="table table-inverse" id="vendor_orders">
                    <thead>
                    <tr>
                        <th></th>
                        <th> identifiant</th>
                        <th> Nom</th>
                        <th> Téléphone</th>
                        <th> Statut</th>
                        <th >Opérateur</th>
                        <th >Total</th>
                        <th >Wilaya</th>
                        <th >Commune</th>
                        <th >Address</th>
                        <th >Suivie</th>
                        <th> Date de création</th>
                        <th> Date de mise à jour</th>
                        <th> Détails</th>
                        <th> Actions</th>
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

            $(document).ready(function () {
                $('#vendor_orders').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    buttons: [
                    ],
                    ajax:{
                        url : '{{route('vendor.orders.index')}}',
                    },
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'status', name: 'status'},
                        {data: 'updated_by', name: 'updated_by'},
                        {data: 'total', name: 'total'},
                        {data: 'address.commune.wilaya.name', name: 'address.commune.wilaya.name'},
                        {data: 'address.commune.name', name: 'address.commune.name'},
                        {data: 'address.address', name: 'address.address'},
                        {data: 'tracking_code', name: 'tracking_code'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'updated_at', name: 'updated_at'},
                        {data: 'details', name: 'details'},
                        {data: 'action', name: 'action'},
                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1},
                        {targets: 'no-sort', orderable: false}
                    ]
                });

            });

            function orderEdit(id){

                var url_change_edit_form = '{{ route("vendor.orders.update",":id") }}';

                url_change_edit_form  =  url_change_edit_form .replace(':id', id);

                $('#form-edit-order').attr('action',url_change_edit_form );


                $('#status').val($('#edit-order'+id).data('status'));

                var id = id;

                var url_update = '{{ route("vendor.orders.edit",":id") }}';

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
                        var data = data.data;

                        $('#name-order-edit').val(data.name);
                        $('#details').text(data.details);

                        $('#product').val(data.product_id);
                        $('#product').trigger('change');

                    }
                });

            }


            function archiveOrder(id) {

                // to use for delete order modal
                var url_change_delete_form = '{{ route("vendor.orders.delete",":id") }}';

                url_change_delete_form = url_change_delete_form.replace(':id', id);

                $('#form-delete-order').attr('action', url_change_delete_form);


            }

        </script>

    @endpush


@endsection
