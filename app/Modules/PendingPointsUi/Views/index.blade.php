@extends('layouts.master')

@push('css')
@include('layouts.extra.css.datatables')


@endpush

@section('content')

    @include('partials.error.error')
    @include('PendingPointsUi::modals.confirm')
    @include('PendingPointsUi::modals.refuse')

    <div class="card">
        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="points_table">
                <thead>
                <tr>
                    <th></th>
                    <th> identifiant </th>
                    <th> Client </th>
                    <th> Points </th>
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



        <script>

            $(document).ready(function () {

                $('#points_table').DataTable({
                        dom: 'Blfrtip',
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        /* paging: false, */
                        language: {
                                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                        },
                        ajax:{
                            url : '/admin-dash/points',
                        },
                        columns: [
                            {data: 'responsive', className: 'responsive'},
                            {data: 'id', name: 'id'},
                            {data: 'client', name: 'min'},
                            {data: 'amount', name: 'amount'},
                            {data: 'created_at', name: 'created_at'},
                            {data: 'action', name: 'action'},

                        ],
                        columnDefs: [
                            {responsivePriority: 1, targets: 0},
                            {responsivePriority: 2, targets: -1},
                            { targets: 'no-sort', orderable: false }
                        ]
                });


            });

            function refuse(id){
                    var url_change_delete_form = '{{ route("admin.points.refuse",":point") }}';

                    url_change_delete_form  =  url_change_delete_form .replace(':point', id);

                    $('#form-refuse-point').attr('action',url_change_delete_form );
            }

            function confirm(id){
                    var url_change_delete_form = '{{ route("admin.points.confirm",":point") }}';

                    url_change_delete_form  =  url_change_delete_form .replace(':point', id);

                    $('#form-confirm-point').attr('action',url_change_delete_form );
            }




        </script>

    @endpush

@endsection
