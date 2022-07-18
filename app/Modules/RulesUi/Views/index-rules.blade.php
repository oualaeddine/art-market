@extends('layouts.master')

@push('css')
@include('layouts.extra.css.datatables')


@endpush

@section('content')

    @include('partials.error.error')
    @include('RulesUi::modals.delete-rules')

    <div class="card">
        <div class="card-header text-end">
            <a href="{{route('admin.coupons.rules.create')}}" class="btn btn-success waves-effect mb-2">Ajouter une regle</a>
        </div>
        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="coupons_rules_table">
                <thead>
                <tr>
                    <th></th>
                    <th> identifiant </th>
                    <th> Min </th>
                    <th> Max </th>
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

                $('#coupons_rules_table').DataTable({
                        dom: 'Blfrtip',
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        /* paging: false, */
                        language: {
                                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                        },
                        ajax:{
                            url : '/admin-dash/coupons-rules',
                        },
                        columns: [
                            {data: 'responsive', className: 'responsive'},
                            {data: 'id', name: 'id'},
                            {data: 'min', name: 'min'},
                            {data: 'max', name: 'max'},
                            {data: 'points', name: 'points'},
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

                function deleteRule(id){


                        var url_change_delete_form = '{{ route("admin.coupons.rules.delete",":rule") }}';

                        url_change_delete_form  =  url_change_delete_form .replace(':rule', id);

                        $('#form-delete-rule').attr('action',url_change_delete_form );

                }




        </script>

    @endpush

@endsection
