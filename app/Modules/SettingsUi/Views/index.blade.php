@extends('layouts.master')

@push('css')
@include('layouts.extra.css.datatables')


@endpush

@section('content')

    @include('partials.error.error')
    @include('SettingsUi::modals.edit')


    <div class="card">
        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="settings_table">
                <thead>
                <tr>
                    <th></th>
                    <th> Identifiant </th>
                    <th> Nom </th>
                    <th> Valeur</th>
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

            $('#settings_table').DataTable({
                dom: '<"top"f>rti<"bottom"lp><"clear">',
                responsive: true,
                processing: true,
                serverSide: true,
                /* paging: false, */
                language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                ajax:{
                    url : '/admin-dash/parametres',
                },
                columns: [
                    {data: 'responsive', className: 'responsive'},
                    {data: 'id', name: 'id'},
                    {data: 'ref', name: 'ref'},
                    {data: 'value', name: 'value'},
                    {data: 'action', name: 'action'},
                ],
                columnDefs: [
                    {responsivePriority: 1, targets: 0},
                    {responsivePriority: 2, targets: -1},
                    {targets: 'no-sort', orderable: false}
                ]
            });

            });


            function SettingEdit(id,name) {

                var url_change_edit_form = '{{ route("admin.settings.update", ":id") }}';

                url_change_edit_form = url_change_edit_form.replace(':id', id);

                $('#form-edit-setting').attr('action', url_change_edit_form);

                $('#param_name').empty()
                $('#param_name').text(name);
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



        </script>

    @endpush

@endsection
