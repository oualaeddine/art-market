@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')
    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')


    @include('VendorsUi::Vendor.modals.orders.raw.delete-raw')
    @include('VendorsUi::Vendor.modals.orders.raw.edit-raw')
    @include('VendorsUi::Vendor.modals.orders.raw.raw_detail')


    {{-- <div class="row"> --}}
    <style>
        #vendors_raw_orders{
            max-width: 100% !important;
            width: 100% !important;
        }
    </style>

    <div class="card">
        <div class="card-block table-border-style">
            <!-- Basic table -->
            <div class=" table-border-style table-responsive">
                <table class="table table-inverse" id="vendors_raw_orders">
                    <thead>
                    <tr>
                        <th></th>
                        <th> identifiant</th>
                        <th> Nom</th>
                        <th> Téléphone</th>
                        <th> Statut</th>
                        <th> Wilaya</th>
                        <th> Commune</th>
                        <th> Total</th>
                        <th> Address</th>
                        <th> Suivie</th>
                        <th> Date de création</th>
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

                $('#vendors_raw_orders').DataTable({
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
                        url : '{{route('vendor.orders.raw.index')}}',

                    },
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'status', name: 'status'},
                        {data: 'wilaya', name: 'wilaya'},
                        {data: 'commune', name: 'commune'},
                        {data: 'total', name: 'total'},
                        {data: 'address', name: 'address'},
                        {data: 'tracking_code', name: 'tracking_code'},
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


            function archiveRawOrder(id) {

                // to use for delete order modal
                var url_change_delete_form = '{{ route("vendor.orders.raw.delete",":order") }}';

                url_change_delete_form = url_change_delete_form.replace(':order', id);

                $('#form-delete-order-raw').attr('action', url_change_delete_form);


            }


            function orderRawEdit(id){

                var url_change_edit_form = '{{ route("vendor.orders.raw.update",":order") }}';

                url_change_edit_form  =  url_change_edit_form .replace(':order', id);

                $('#form-edit-order-raw').attr('action',url_change_edit_form );


                $('#status').val($('#edit-order'+id).data('status'));



            }

            function getRawDetailDataVendor(order_id) {

                $('#raw_order_detail tbody').empty()
                var url='{{route('vendor.orders.raw.getDetail',['order'=>':id'])}}';
                url = url.replace(':id', order_id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    error: function (error) {
                        console.log(error)
                        // toastr.error("Something went wrong , try again please !");
                    },
                    success: function (data) {

                        $.each(data, function (i, prod) {
                            $("#raw_order_detail tbody").append('<tr><td></td><td>'+prod.name+'</td><td>'+prod.price+'</td><td>'+prod.qty+'</td><td>'+prod.discount+'</td><td>'+prod.total+'</td></tr>')
                        });
                    }
                });
            }


        </script>

    @endpush


@endsection
