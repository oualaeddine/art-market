@extends('layouts.master')
@push('css')

    @include('layouts.extra.css.datatables')

    @include('layouts.extra.css.select2')

@endpush


@section('content')

    @include('partials.error.error')
    @include('ClientsUi::modals.address.delete')

    <div class="card">

        <div class="card-header">
            <div class="row">

                <div class="col-md-6">
                    <h3>Coupons archivées</h3>
                </div>


            </div>


        </div>
        <div class="card-block pt-0" id="nav-tab-2">
            @include('ClientsUi::sections.details.client_coupons_archived')
        </div>


    </div>




    @push('js')
        @include('layouts.extra.js.datatables')
        @include('layouts.extra.js.select2')

        <script>

            $(document).ready(function () {


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
        </script>
    @endpush
@endsection
