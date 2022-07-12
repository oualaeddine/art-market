@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')
    @include('layouts.extra.css.select2')
    <style>
        #vendor_brands{
            max-width: 100% !important;
            width: 100% !important;
        }
    </style>
@endpush

@section('content')

    @include('partials.error.error')

    @include('VendorsUi::Vendor.modals.brands.create')
    @include('VendorsUi::Vendor.modals.brands.toggle')

{{-- <div class="row"> --}}


    <div class="card">
        <div class="card-header text-end">
            <a role="button"  class="w-auto  btn  btn-success  waves-effect mx-2"
               data-bs-toggle="modal"
               data-bs-target="#modals-vendor-sync-brands"

               href="javascript:void(0)"
            >Synchroniser les marques</a>
        </div>
        <div class="card-block table-border-style">
            <!-- Basic table -->
            <div class=" table-border-style table-responsive">
                <table class="table table-inverse" id="vendor_brands">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Identifiant</th>
                        <th>Nom en français</th>
                        <th>Nom en arabe</th>
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

                $(document).ready(function () {
                    $('.brands-select').select2({
                        placeholder: "Sélectionnez les marques",
                        allowClear: true
                    });

                    $('#vendor_brands').DataTable({
                        dom: '<"top"f>rti<"bottom"lp><"clear">',
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        /* paging: false, */
                        language: {
                            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                        },
                        ajax: {
                            url : '{{route('vendor.brands.index')}}',

                        },
                        columns: [
                            {data: 'responsive', className: 'responsive'},
                            {data: 'id', name: 'id'},
                            {data: 'brand.name_fr', name: 'brand.name_fr'},
                            {data: 'brand.name_ar', name: 'brand.name_ar'},
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


                function ToggleBrand(id){


                    var url_change_delete_form = '{{ route("vendor.brands.toggle",":brand") }}';

                    url_change_delete_form  =  url_change_delete_form .replace(':brand', id);

                    $('#form-toggle-brand').attr('action',url_change_delete_form );

                }

        </script>

@endpush


@endsection
