@extends('layouts.master')

@push('css')
@include('layouts.extra.css.datatables')


@endpush

@section('content')

    @include('partials.error.error')
    @include('WebsiteImagesUi::modals.toggle')

    <div class="card">

        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="website-images_table">
                <thead>
                <tr>
                    <th></th>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Lang</th>
                    <th>Titre</th>
                    <th>Image</th>
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


    @push('js')
        @include('layouts.extra.js.datatables')



        <script>
            function ToggleImage(id){


                var url_change_delete_form = '{{ route("admin.website-images.toggle",":website_image") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':website_image', id);

                $('#form-toggle-image').attr('action',url_change_delete_form );

            }
            $(document).ready(function () {

            $('#website-images_table').DataTable({
                dom: '<"top"f>rti<"bottom"lp><"clear">',
                responsive: true,
                processing: true,
                serverSide: true,
                /* paging: false, */
                language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                ajax:{
                    url : '/admin-dash/website-images',
                },
                columns: [
                    {data: 'responsive', className: 'responsive'},
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'lang', name: 'lang'},
                    {data: 'title', name: 'title'},
                    {data: 'image', name: 'image'},
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

        </script>

    @endpush

@endsection
