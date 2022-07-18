@extends('layouts.master')

@push('css')
@include('layouts.extra.css.datatables')


@endpush

@section('content')

    @include('partials.error.error')
    @include('OrdersUi::modals.delete-raw')
    @include('OrdersUi::modals.edit-raw')
    @include('OrdersUi::modals.raw_detail')

    <div class="card">
         <div class="card-header text-end">
             <a href="javascript:void(0)" onclick="$('.buttons-excel').click()" class="btn  btn-secondary waves-effect mb-2"> Exporter .xls</a>

             {{--            <a href="{{route('admin.orders.create')}}" class="btn btn-success waves-effect mb-2"> Ajouter une catégorie</a>--}}
        </div>
        <div class="card-block table-border-style table-responsive">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
                </div>
                <div class="col-md-4">
                    <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
                </div>
                <div class="col-md-2">
                    <button type="button" name="filter" id="filter" class="btn btn-primary w-100">Filtrer</button>
                </div>
                <div class="col-md-2">
                    <button type="button" name="refresh" id="refresh" class="btn btn-info w-100">Réinitialiser</button>
                </div>
            </div>
            <table class="table table-inverse" id="orders_table">
                <thead>
                <tr>
                    <th></th>
                    <th> identifiant</th>
                    <th> Vendeur</th>
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
        <div class="card-header text-start">
            <a href="{{route('admin.orders.raw.archived')}}"  class="btn  btn-danger waves-effect mb-2"> Nouvelle commandes archivés</a>

            {{--            <a href="{{route('admin.orders.create')}}" class="btn btn-success waves-effect mb-2"> Ajouter une catégorie</a>--}}
        </div>
    </div>


    @push('js')
        @include('layouts.extra.js.datatables')



        <script>

            $(document).ready(function () {
                load_data();
                function load_data(from_date = '', to_date = '') {

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
                                text: 'Exporter .xls',
                                className: 'btn block btn-success rounded m-r-30 visually-hidden',
                                exportOptions: {
                                    columns: [1, 2, 3, 4, 5, 6]
                                },
                                init: function (api, node, config) {
                                    $(node).removeClass('dt-button')
                                }
                            },
                        ],
                        ajax: {
                            url: '/admin-dash/raw-commandes',
                            data:{from_date:from_date, to_date:to_date}
                        },
                        columns: [
                            {data: 'responsive', className: 'responsive'},
                            {data: 'id', name: 'id'},
                            {data: 'vendor', name: 'vendor'},
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

                }

                $('#filter').click(function(){
                    var from_date = $('#from_date').val();
                    var to_date = $('#to_date').val();
                    if(from_date != '' &&  to_date != '')
                    {
                        $('#orders_table').DataTable().destroy();
                        load_data(from_date, to_date);
                    }
                    else
                    {
                        alert('Les deux dates sont obligatoires');
                    }
                });

                $('#refresh').click(function(){
                    $('#from_date').val('');
                    $('#to_date').val('');
                    $('#orders_table').DataTable().destroy();
                    load_data();
                });
            });




            function archiveOrder(id) {

                // to use for delete order modal
                var url_change_delete_form = '{{ route("admin.orders.raw.delete",":order") }}';

                url_change_delete_form = url_change_delete_form.replace(':order', id);

                $('#form-delete-order').attr('action', url_change_delete_form);


            }

            function orderEdit(id){

                var url_change_edit_form = '{{ route("admin.orders.raw.update",":order") }}';

                url_change_edit_form  =  url_change_edit_form .replace(':order', id);

                $('#form-edit-order').attr('action',url_change_edit_form );


                $('#status').val($('#edit-order'+id).data('status'));



            }


            function getDetailData(order_id) {
                $('#raw_order_detail tbody').empty()
                $.ajax({
                    url: 'raw-commandes/getDetail/' + order_id,
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
