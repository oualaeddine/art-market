@extends('layouts.master')

@push('css')
@include('layouts.extra.css.datatables')


@endpush

@section('content')

    @include('partials.error.error')
    @include('SettingsUi::modals.faq.delete')
    @include('SettingsUi::modals.faq.create')
    @include('SettingsUi::modals.faq.edit')
    @include('SettingsUi::modals.faq.toggle')


    <div class="card">
        <div class="card-block table-border-style table-responsive">
            <div class="card-header text-end">
                <button type="button" class="btn btn-success waves-effect" data-bs-toggle="modal" data-bs-target="#modals-add-faq" > Ajouter un faq</button>

            </div>
            <table class="table table-inverse" id="settings_table">
                <thead>
                <tr>
                    <th></th>
                    <th> Identifiant </th>
                    <th> Question </th>
                    <th> Réponse</th>
                    <th> Actif</th>
                    <th> Language</th>
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
            function ToggleFaq(id){


                var url_change_delete_form = '{{ route("admin.faq.toggle",":faq") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':faq', id);

                $('#form-toggle-faq').attr('action',url_change_delete_form );

            }
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
                    url : '/cod-dash/faq',
                },
                columns: [
                    {data: 'responsive', className: 'responsive'},
                    {data: 'id', name: 'id'},
                    {data: 'question', name: 'question'},
                    {data: 'answer', name: 'answer'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'lang', name: 'lang'},
                    {data: 'action', name: 'action'},
                ],
                columnDefs: [
                    {responsivePriority: 1, targets: 0},
                    {responsivePriority: 2, targets: -1},
                    {targets: 'no-sort', orderable: false}
                ]
            });

            });


            function EditFaq(id) {

                var url_change_edit_form = '{{ route("admin.faq.update", ":faq") }}';

                url_change_edit_form = url_change_edit_form.replace(':faq', id);

                $('#form-edit-faq').attr('action', url_change_edit_form);


                var id = id;

                var url_update = '{{ route("admin.faq.edit", ":faq") }}';

                url_update = url_update.replace(':faq', id);

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

                        $('#is_active_edit').val(data.is_active);
                        $('#answer_edit').val(data.answer);
                        $('#question_edit').val(data.question);
                        $('#lang_edit').val(data.lang);
                    }
                });
            }

            function DeleteFaq(id) {

                // to use for delete order modal
                var url_change_delete_form = '{{ route("admin.faq.delete",":faq") }}';

                url_change_delete_form = url_change_delete_form.replace(':faq', id);

                $('#form-delete-faq').attr('action', url_change_delete_form);


            }
        </script>

    @endpush

@endsection
