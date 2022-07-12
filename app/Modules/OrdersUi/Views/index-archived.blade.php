@extends('layouts.master')

@push('css')
@include('layouts.extra.css.datatables')


@endpush

@section('content')

    @include('partials.error.error')
    @include('OrdersUi::modals.restore')


    <div class="card">
        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="orders_table">
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


    @push('js')
        @include('layouts.extra.js.datatables')



        <script>

            $(document).ready(function () {

            $('#orders_table').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                processing: true,
                serverSide: true,
                /* paging: false, */
                language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                buttons: [
                    {
                        extend: 'excel',
                        text:'Exporter .xls',
                        className: 'btn block btn-success rounded m-r-30 visually-hidden',
                        exportOptions: {
                            columns: [ 1,2,3,4,5,6]
                        },
                        init: function(api, node, config) {
                            $(node).removeClass('dt-button')
                        }
                    },
                ],
                ajax:{
                    url : '{{route('admin.orders.archived')}}',
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


            function RestoreOrder(id) {

                // to use for delete order modal
                var url_change_delete_form = '{{ route("admin.orders.restore",":id") }}';

                url_change_delete_form = url_change_delete_form.replace(':id', id);

                $('#form-restore-order').attr('action', url_change_delete_form);


            }

            function orderEdit(id){

                var url_change_edit_form = '{{ route("admin.orders.update",":id") }}';

                url_change_edit_form  =  url_change_edit_form .replace(':id', id);

                $('#form-edit-order').attr('action',url_change_edit_form );


                $('#status').val($('#edit-order'+id).data('status'));

                var id = id;

                var url_update = '{{ route("admin.orders.edit",":id") }}';

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

            function getDetailData(order_id) {
                $('#order_detail tbody').empty()

                $.ajax({
                    url: 'commandes/getDetail/' + order_id,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    error: function (error) {
                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function (data) {
                        console.log(data)
                        $.each(data, function (i, prod) {
                            $("#order_detail tbody").append('<tr><td></td><td>'+prod.name+'</td><td>'+prod.price+'</td><td>'+prod.qty+'</td><td>'+prod.discount+'</td></tr>')
                        });
                    }
                });
            }


        </script>

    @endpush

@endsection
