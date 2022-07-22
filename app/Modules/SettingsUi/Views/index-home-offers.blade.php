@extends('layouts.master')

@push('css')
@include('layouts.extra.css.datatables')
@include('layouts.extra.css.select2')


@endpush

@section('content')

    @include('partials.error.error')
    @include('SettingsUi::modals.home-offers.delete')
    @include('SettingsUi::modals.home-offers.create')


    <div class="card">
        <div class="card-block table-border-style table-responsive">
            <div class="card-header text-end">
                <button type="button" class="btn btn-success waves-effect" data-bs-toggle="modal" data-bs-target="#modals-add-prod" > Ajouter un produit</button>

            </div>
            <table class="table table-inverse" id="settings_table">
                <thead>
                <tr>
                    <th></th>
                    <th> Identifiant </th>
                    <th> Nom fr </th>
                    <th> Nom ar </th>
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
                    url : '/admin-dash/home-offers',
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


            function SettingEdit(id) {

                var url_change_edit_form = '{{ route("admin.settings.update", ":id") }}';

                url_change_edit_form = url_change_edit_form.replace(':id', id);

                $('#form-edit-setting').attr('action', url_change_edit_form);


                var id = id;

                var url_update = '{{ route("admin.settings.edit", ":id") }}';

                url_update = url_update.replace(':id', id);

                $.ajax({
                    url: url_update,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },

                    error: function(error) {
                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function(data) {

                        var data = data.data;


                        $('#value_setting_edit').text(data.value);
                    }
                });
            }

            function deleteHomeOffer(id) {

                // to use for delete order modal
                var url_change_delete_form = '{{ route("admin.home-offers.delete",":offer") }}';

                url_change_delete_form = url_change_delete_form.replace(':offer', id);

                $('#form-delete-home-offer-prod').attr('action', url_change_delete_form);


            }

            $('#product_id').select2({
                 placeholder: "écrire...",
                theme: 'bootstrap4',
                delay: 200,
                minimumInputLength: 4,
                ajax: {
                    url: '{{route('admin.home-offers.get.products')}}',
                    dataType: 'json',
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                }
            });

        </script>

    @endpush

@endsection
