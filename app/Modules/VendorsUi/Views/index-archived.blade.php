@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')
    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')

    @include('VendorsUi::modals.restore')

{{-- <div class="row"> --}}


    <div class="card">
        <div class="card-block table-border-style">
            <!-- Basic table -->
                            <table class="table table-inverse" id="brands_table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th> identifiant </th>
                                    <th> Nom en français </th>
                                    <th> Nom en arabe </th>
                                    <th> Sommaire en français </th>
                                    <th> Sommaire en arabe </th>
{{--                                    <th> description en français </th>--}}
{{--                                    <th> description en arabe </th>--}}
                                    <th> Logo en français </th>
{{--                                    <th> Logo en arabe</th>--}}
                                    <th> Actif</th>
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
                    $('#brands_table').DataTable({
                        dom: 'Bfrtip',
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        /* paging: false, */
                        language: {
                            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                        },
                        ajax:{
                            url : '{{route('admin.vendors.archived')}}',
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
                            {data: 'name_fr', name: 'name_fr'},
                            {data: 'name_ar', name: 'name_ar'},
                            {data: 'short_dec_fr', name: 'short_dec_fr'},
                            {data: 'short_dec_ar', name: 'short_dec_ar'},
                            // {data: 'desc_fr', name: 'desc_fr'},
                            // {data: 'desc_ar', name: 'desc_ar'},
                            {data: 'logo_fr', name: 'logo_fr'},
                            // {data: 'logo_ar', name: 'logo_ar'},
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

                function RestoreVendor(id){


                var url_change_delete_form = '{{ route("admin.vendors.restore",":vendor") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':vendor', id);

                $('#form-restore-vendor').attr('action',url_change_delete_form );

                }


        </script>

@endpush


@endsection
