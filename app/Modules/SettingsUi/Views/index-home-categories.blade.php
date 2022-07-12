@extends('layouts.master')

@push('css')
@include('layouts.extra.css.datatables')
@include('layouts.extra.css.select2')


@endpush

@section('content')

    @include('partials.error.error')
    @include('SettingsUi::modals.home-categories.delete')
    @include('SettingsUi::modals.home-categories.create')


    <div class="card">
        <div class="card-block table-border-style table-responsive">
            <div class="card-header text-end">
                <button type="button" class="btn btn-success waves-effect" data-bs-toggle="modal" data-bs-target="#modals-add-prod" > Ajouter une catégorie</button>

            </div>
            <table class="table table-inverse" id="settings_table">
                <thead>
                <tr>
                    <th></th>
                    <th> Identifiant </th>
                    <th> Nom ar </th>
                    <th> Nom fr </th>
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

            $('#settings_table').DataTable({
                dom: '<"top"f>rti<"bottom"lp><"clear">',
                responsive: true,
                processing: true,
                serverSide: true,
                /* paging: false, */
                language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                buttons: [

                ],
                ajax:{
                    url : '/cod-dash/home-categories',
                },
                columns: [
                    {data: 'responsive', className: 'responsive'},
                    {data: 'id', name: 'id'},
                    {data: 'name_fr', name: 'name_fr'},
                    {data: 'name_ar', name: 'name_ar'},
                    {data: 'action', name: 'action'},
                ],
                columnDefs: [
                    {responsivePriority: 1, targets: 0},
                    {responsivePriority: 2, targets: -1},
                    {targets: 'no-sort', orderable: false}
                ]
            });

            });



            function deleteHomeOffer(id) {

                // to use for delete order modal
                var url_change_delete_form = '{{ route("admin.home-categories.delete",":offer") }}';

                url_change_delete_form = url_change_delete_form.replace(':offer', id);

                $('#form-delete-home-offer-prod').attr('action', url_change_delete_form);


            }

            $('#category_id').select2({
                 placeholder: "Sélectionnez une catégorie",
                theme: 'bootstrap4',

            });

        </script>

    @endpush

@endsection
