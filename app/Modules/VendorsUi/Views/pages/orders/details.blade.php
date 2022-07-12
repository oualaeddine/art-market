@extends('layouts.master')

@push('css')
@include('layouts.extra.css.datatables')


@endpush

@section('content')

    @include('partials.error.error')

    <div class="card">
{{--         <div class="card-header text-end">
            <a href="{{route('admin.orders.create')}}" class="btn btn-success waves-effect mb-2"> Ajouter une catégorie</a>
        </div> --}}
        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="orders_table">
                <thead>
                <tr>
                    <th></th>
                    <th> identifiant</th>
                    <th> Nom de Produit</th>
                    <th> Quantité</th>
                    <th> Prix</th>
                    <th> Total</th>
                    {{-- <th> Statut</th> --}}
                    <th> Date de création</th>
                    {{-- <th> Actions</th> --}}
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
                dom: '<"top"f>rti<"bottom"lp><"clear">',
                responsive: true,
                processing: true,
                serverSide: true,
                /* paging: false, */
                language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                ajax:{
                    url : window.localhost,
                },
                columns: [
                    {data: 'responsive', className: 'responsive'},
                    {data: 'id', name: 'id'},
                    {data: 'product.name_fr', name: 'product.name_fr'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'price', name: 'price'},
                    {data: 'total', name: 'total'},
                   /*  {data: 'status', name: 'status'}, */
                    {data: 'created_at', name: 'created_at'},
                  /*   {data: 'action', name: 'action'}, */
                ],
                columnDefs: [
                    {responsivePriority: 1, targets: 0},
                    {responsivePriority: 2, targets: -1},
                    {targets: 'no-sort', orderable: false}
                ]
            });

            });



        </script>

    @endpush

@endsection
