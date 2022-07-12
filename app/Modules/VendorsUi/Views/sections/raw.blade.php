
@include('VendorsUi::modals.raw.delete-raw')
@include('VendorsUi::modals.raw.edit-raw')
@include('VendorsUi::modals.raw.raw_detail')

<div class="card">

    <div class="card-block table-border-style table-responsive">

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


@push('js')
    @include('layouts.extra.js.datatables')



    <script>

        function archiveRawOrder(id) {

            // to use for delete order modal
            var url_change_delete_form = '{{ route("admin.vendors.orders.raw.delete",":order") }}';

            url_change_delete_form = url_change_delete_form.replace(':order', id);

            $('#form-delete-order-raw').attr('action', url_change_delete_form);


        }

        function orderRawEdit(id){

            var url_change_edit_form = '{{ route("admin.vendors.orders.raw.update",":order") }}';

            url_change_edit_form  =  url_change_edit_form .replace(':order', id);

            $('#form-edit-order-raw').attr('action',url_change_edit_form );


            $('#status').val($('#edit-order'+id).data('status'));



        }


        function getRawDetailDataVendor(order_id) {

            $('#raw_order_detail tbody').empty()
            var url='{{route('admin.vendors.orders.raw.getDetail',['order'=>':id'])}}';
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
