@extends('layouts.master')
@push('css')

    @include('layouts.extra.css.datatables')

    @include('layouts.extra.css.select2')

@endpush


@section('content')

    @include('partials.error.error')
    @include('ClientsUi::modals.special.information')
    @include('ClientsUi::modals.special.telephon')

    @include('ClientsUi::modals.address.delete')
    @include('ClientsUi::modals.address.create')
    @include('ClientsUi::modals.address.edit')

{{--    @include('ClientsUi::modals.coupon.create')--}}

    @include('OrdersUi::modals.delete')
    @include('OrdersUi::modals.edit')
    @include('OrdersUi::modals.detail')

    <style>
        .hiddenfile {
            width: 0px;
            height: 0px;
            overflow: hidden;
        }

        .label {
            text-transform: initial !important;
        }

        #clients_files_table{
            max-width: 100% !important;
            width: 100% !important;
        }
        #clients_contact_table{
            max-width: 100% !important;
            width: 100% !important;
        }
        #clients_profile_table{
            max-width: 100% !important;
            width: 100% !important;
        }
        #clients_phones_table{
            max-width: 100% !important;
            width: 100% !important;
        }
        #clients_pieces_table{
            max-width: 100% !important;
            width: 100% !important;
        }
        #orders_table{
            max-width: 100% !important;
            width: 100% !important;
        }
    </style>


<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card sale-card">
            <div class="card-header">
                <h5>Profil de client</h5>
            </div>
            <form method="post" action="{{route('admin.client-profile.update-special-avatar',['client'=>$client->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-block border-bottom text-center" style="position:relative;">

                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger">
                        @if ($client->avatar != null)

                            <img id="preview-image-before-upload"  src="{{asset($client->avatar)}}" style="width:150px; height:150px;border-radius: 10px;max-height: 250px;">

                        @else

                            <img id="preview-image-before-upload"  src="{{asset('admin.png')}}" style="width:150px; height:150px;border-radius: 10px;max-height: 250px;">

                        @endif
                    </div>
                    <a href="javascript:void(0)" onclick="$('#image').trigger('click'); " class="text-mute d-block mt-n5"><i class="icofont icofont-shield m-r-10"></i>Sélectionnez une photo de profil</a>
                    <button id="submit_photo" type="submit"  class="btn btn-success">Sauvegarder </button>
                    <div class="hiddenfile">
                        <input required name="avatar" type="file" id="image"/>
                    </div>
                </div>
            </form>
            <div class="card-body border-bottom text-center text-dark" style="position: relative">



                <h6 class="mb-4 mt-3">Les informations principales</h6>
                <label data-bs-toggle="modal"
                       onclick="ClientEdit({{$client->id}})"
                data-bs-target="#modals-edit_info_spec"
                    role="button" class="text-dark form-label label label-inverse-primary label-lg w-100 d-flex justify-content-between mb-2"><b class="font-weight-bold">Nom</b>{{$client->last_name}}</label>
                <label data-bs-toggle="modal"
                       onclick="ClientEdit({{$client->id}})"
                data-bs-target="#modals-edit_info_spec"
                    role="button" class="text-dark form-label label label-inverse-primary label-lg w-100 d-flex justify-content-between mb-2"><b class="font-weight-bold">Prénom</b> {{$client->first_name}}</label>
                <label data-bs-toggle="modal"
                       onclick="ClientEdit({{$client->id}})"
                data-bs-target="#modals-edit_info_spec"
                    role="button" class="text-dark form-label label label-inverse-primary label-lg w-100 d-flex justify-content-between mb-2"><b class="font-weight-bold">Wilaya</b> {{$client->wilaya}}</label>
                <label data-bs-toggle="modal"
                       onclick="ClientEdit({{$client->id}})"
                data-bs-target="#modals-edit_info_spec"
                    role="button" class="text-dark form-label label label-inverse-primary label-lg w-100 d-flex justify-content-between mb-2"><b class="font-weight-bold">Commune</b> {{$client->commune->name??''}}</label>
                    <label data-bs-toggle="modal"
                           onclick="ClientEdit({{$client->id}})"
                    data-bs-target="#modals-edit_info_spec"
                        role="button" class="text-dark form-label label label-inverse-primary label-lg w-100 d-flex justify-content-between mb-2"><b class="font-weight-bold">Email</b> {{$client->email??''}}</label>
                    <label data-bs-toggle="modal"
                           onclick="ClientEdit({{$client->id}})"
                    data-bs-target="#modals-edit_info_spec"
                    role="button" class="text-dark form-label label label-inverse-primary label-lg w-100 d-flex justify-content-between mb-2"><b class="font-weight-bold">Téléphone</b> {{'0'.$client->phone}}</label>


                 </div>



        </div>
    </div>

    <div class="col-xl-9 col-md-12">
        <div class="col-12">
            <div class="card feed-card">
                <div class="card-block pt-0" id="nav-tab-2">
                    <ul class="nav nav-tabs md-tabs" id="nav-tab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link active" data-bs-toggle="tab" href="#Addresses" role="tab" aria-selected="true">Adresses</a>
                            <div class="slide"></div>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-bs-toggle="tab" href="#Coupons" role="tab" aria-selected="false">Coupons</a>--}}
{{--                            <div class="slide"></div>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#Orders" role="tab" aria-selected="false">Commandes confirmées</a>
                            <div class="slide"></div>
                        </li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content mt-2" >
                        <div class="tab-pane " id="Addresses" role="tabpanel">

                            <div class="col-md-12 my-4 text-end">
                                <button class="btn btn-success " data-bs-toggle="modal" data-bs-target="#modals-create-client-address">Ajouter adresse</button>
                            </div>
                            @include('ClientsUi::sections.details.client_address')

                        </div>

{{--                        <div class="tab-pane" id="Coupons" role="tabpanel">--}}
{{--                            <div class="col-md-12 my-4 text-end">--}}
{{--                                <button class="btn btn-success" onclick="getFamiliesCall()" data-bs-toggle="modal" data-bs-target="#modals-create-client-coupon">Ajouter un coupon</button>--}}
{{--                            </div>--}}
{{--                            @include('ClientsUi::sections.details.client_coupons')--}}

{{--                        </div>--}}

                        <div class="tab-pane" id="Orders" role="tabpanel">
                            @include('ClientsUi::sections.details.client_orders')
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    function ClientEdit(id){
        var id = id;

        var url_update = '{{ route("admin.clients.get.info",":client") }}';

        url_update = url_update.replace(':client', id);

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

                $('#last_name').val(data.client.last_name);
                $('#first_name').val(data.client.first_name);
                $('#phone').val('0'+data.client.phone);
                $('#email').val(data.client.email);
                $('#wilaya').val(data.client.wilaya);
                $('#commune_id').append('<option selected value="'+data.client.commune_id+'" >'+data.client.commune.name+'</option>');
                {{--$('#wilaya option[value={{"{$client_wilaya->name}"}}]').attr("selected", "selected");--}}
                {{--$('#commune_id').append('<option value="{{$client_commune['id']}}" selected>{{$client_commune['name']}}</option>').trigger('change');--}}
            }
        });


    }

    function getFamiliesCall(){
        $('#family_id').empty()
        $.ajax({
            url: '{{route('admin.clients.get.families')}}',
            type: 'GET', dataType: 'json',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },

            error: function (error) {
                toastr.error("Something went wrong , try again please !");
            },
            success: function (data) {
                $('#family_id').append('<option value="" selected disabled>Sélectionnez une fammilie</option>')
                $.each(data.data.families, function (i, family) {
                    $('#family_id').append('<option value="'+family.id+'">'+family.name+'</option>')
                });
            }
        });


    }
</script>
@push('js')
    @include('layouts.extra.js.datatables')
    @include('layouts.extra.js.select2')

    <script>

        function archiveOrder(id) {

            // to use for delete order modal
            var url_change_delete_form = '{{ route("admin.orders.delete",":id") }}';

            url_change_delete_form = url_change_delete_form.replace(':id', id);

            $('#form-delete-order').attr('action', url_change_delete_form);


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
                url: '/admin-dash/commandes/getDetail/' + order_id,
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
                        $("#order_detail tbody").append('<tr><td></td><td>'+prod.name+'</td><td>'+prod.price+'</td><td>'+prod.qty+'</td><td>'+prod.discount+'</td><td>'+prod.total+'</td></tr>')
                    });
                }
            });
        }

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
                        url: '/admin-dash/commandes?client_id='+ {{$client->id}},
                        data:{from_date:from_date, to_date:to_date}
                    },
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'vendor', name: 'vendor'},
                        {data: 'name', name: 'name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'status', name: 'status'},
                        {data: 'updated_by', name: 'updated_by'},
                        {data: 'total', name: 'total'},
                        {data: 'address.commune.wilaya.name', name: 'address.commune.wilaya.name'},
                        {data: 'id', name: 'address.commune.name'},
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

            $('#nav-tab-2').tabs({
                activate: function (event, ui) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust()
                        .responsive.recalc();
                },
                create: function (event, ui) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust()
                        .responsive.recalc();
                }
            });


            $('#nav-tab  a[href="#{{$tab}}"]').tab('show')

            $('#nav-tab-2').tabs({
                activate: function (event, ui) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust()
                        .responsive.recalc();
                },
                create: function (event, ui) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust()
                        .responsive.recalc();
                }
            });


            $('.commune_address_id').select2({
                /* placeholder: "Start typing ...", */
                theme: 'bootstrap4',
                minimumInputLength:3,
                ajax: {
                    url: '{{route('admin.clients.get.commune_wilaya')}}',
                    dataType: 'json',
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },

                }
            });

            $('#image').change(function(){

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });



            $('#wilaya').on('change', function () {

                var id = $(this).find('option:selected').data('id');
                $('#commune_id').val(null).trigger('change');
                var url_coumne = '{{ route("admin.clients.get.commune",":id") }}';

                url_coumne = url_coumne.replace(':id', id);

                $('#commune_id').select2({
                    /* placeholder: "Start typing ...", */
                    theme: 'bootstrap4',
                    ajax: {
                        url: url_coumne,
                        dataType: 'json',
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },

                    }
                });

            });

            $('#wilaya_id_p').on('change', function () {

                var id = $(this).val();
                // $('#commune_id_p').val(null).trigger('change');
                var url_coumne = '{{ route("admin.clients.get.commune",":id") }}';


                $('#commune_id_p').val(null).trigger('change');

                url_coumne = url_coumne.replace(':id', id);

                $('#commune_id_p').select2({
                    /* placeholder: "Start typing ...", */
                    theme: 'bootstrap4',
                    ajax: {
                        url: url_coumne,
                        dataType: 'json',
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },

                    }
                });

            });
            $('#wilaya_id_p_edit').on('change', function () {

                var id = $(this).val();
                $('#commune_id_p_edit').val(null).trigger('change');
                var url_coumne = '{{ route("admin.clients.get.commune",":id") }}';

                url_coumne = url_coumne.replace(':id', id);

                $('#commune_id_p_edit').select2({
                    /* placeholder: "Start typing ...", */
                    theme: 'bootstrap4',
                    ajax: {
                        url: url_coumne,
                        dataType: 'json',
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },

                    }
                });

            });

            $('#clients_address_table').DataTable({
                dom: '<"top"f>rti<"bottom"lp><"clear">',
                responsive: true,
                processing: true,
                /* paging: false, */
                language: {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                columnDefs: [
                    {responsivePriority: 1, targets: 0},
                    {responsivePriority: 2, targets: -1},
                ]
            });


        });


        $('#image').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

        $('#wilaya_id').on('change',function(){


            $('#commune_id').val('');

            var id = $(this).val();

            var url_coumne = '{{ route("admin.clients.get.commune",":id") }}';

            url_coumne = url_coumne.replace(':id', id);

            $('#commune_id').select2({
                /* placeholder: "Start typing ...", */
                theme: 'bootstrap4',
                ajax: {
                    url: url_coumne,
                    dataType: 'json',
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },

                }
            });

        })
        const PhoneRegEx = /^0\d{9}$/g;
        const PhoneRegEx2 = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
        const PhoneRegEx3 = /^\d{9}$/g;
        const PhoneRegEx4 = /^[0-9]{1,2}?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;


        $('.phone-input').on('input',function(){
            var phone=$(this).val();
            $(this).removeClass('border-danger')

            if($(this).val().length >= 9 && $(this).val().length <= 14 ){

                if (
                    ($(this).val().match(PhoneRegEx) ||
                        $(this).val().match(PhoneRegEx2)||
                        $(this).val().match(PhoneRegEx3) ||
                        $(this).val().match(PhoneRegEx4))

                    && (
                        phone.startsWith('00213') && phone.length===14 ||
                        phone.startsWith('0213') && phone.length===13 ||
                        phone.startsWith('213') && phone.length===12 ||
                        phone.startsWith('+213') && phone.length===13 ||
                        (phone.startsWith('5') || phone.startsWith('6') || phone.startsWith('7')) && phone.length===9 ||
                        phone.startsWith('0')  && phone.length===10
                    )

                ) {

                    $('.btn-phone-send').attr('disabled',false)
                    $(this).addClass('border-success')
                    $(this).removeClass('border-danger')
                    $('.invalid-phone').hide()

                }else{

                    $('.btn-phone-send').attr('disabled',true)
                    $(this).removeClass('border-success')
                    $(this).addClass('border-danger')
                    $('.invalid-phone').show()

                }
            }else{
                $('.btn-phone-send').attr('disabled',true)
                $(this).removeClass('border-success')
                $(this).addClass('border-danger')
                $('.invalid-phone').show()
            }
        })

    </script>
@endpush
@endsection
