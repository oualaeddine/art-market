@extends('layouts.master')
@push('css')

    @include('layouts.extra.css.datatables')

    @include('layouts.extra.css.select2')


    <style>

        .select2-selection__choice {
            background-color: #5897fb !important;
            border: none !important;
        }

        .select2-selection__choice__remove {
            color: white !important;
        }

        .select2-selection__choice__remove:hover {
            background: darkblue !important;
        }

        /*   .select2-container--default .select2-results__option--highlighted[aria-selected] {
          background-color: #5897fb !important;
          color: black;
          } */


    </style>


@endpush
@section('content')

    @include('content.roles.models.create')
    @include('content.roles.models.edit')
    @include('content.roles.models.delete')

    {{-- <div class="row"> --}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-success waves-effect mb-2" data-bs-toggle="modal"
                    data-bs-target="#modals-add-role"> Ajouter un rôle
            </button>
        </div>
        <div class="card-block table-border-style table-responsive">
            <!-- Basic table -->
            {{-- <section id="basic-datatable"> --}}
            {{--  <div class="row">
                 <div class="col-12">
                     <div class="card"> --}}
            <table class="table table-inverse" id="roles_table">
                <thead>
                <tr>
                    <th></th>
                    <th> identifiant</th>
                    <th> Nom</th>
                    <th> Date de création</th>
                    <th> Actions</th>
                </tr>
                </thead>
                <tbody>
                {{--                @foreach ($users as $p)--}}
                {{--                    <tr>--}}
                {{--                        <td></td>--}}
                {{--                        <td>{{$p->id}}</td>--}}
                {{--                        <td>{{$p->name}}</td>--}}
                {{--                        <td>{{$p->email}}</td>--}}

                {{--                        <td>@if($p->blocked_at) <label class="label label-danger">Blocker</label> @else <label class="label label-info">Non Blocker</label> @endif </td>--}}
                {{--                        <td>@if($p->deleted_at) <label class="label label-danger">Archiver</label> @else <label class="label label-info">Non Archiver</label> @endif </td>--}}
                {{--                        <td>@include('content.users.actions.btn')</td>--}}


                {{--                    </tr>--}}
                {{--                @endforeach--}}
                </tbody>
                {{--                {{$users->links()}}--}}
            </table>
            {{--        </div>
               </div>
           </div> --}}



            {{--  </section> --}}
        </div>

        {{--  <div class="card-footer text-right">
             <div class="text-right">
                 {{$products->links('pagination::bootstrap-4')}}
             </div>
         </div> --}}


    </div>

    {{--
    </div> --}}

    @push('js')
        @include('layouts.extra.js.datatables')

        @include('layouts.extra.js.select2')




        <script>

            $(document).ready(function () {

                // $(document).ready(function () {
                //     $('.js-example-basic-single').select2({
                //         placeholder: "Sélectionnez les Roles",
                //         allowClear: true
                //     });
                //     $('.roles_select_edit').select2({
                //         placeholder: "Sélectionnez les Roles",
                //         allowClear: true
                //     });
                // });


                $('#roles_table').DataTable({
                    dom: 'Blfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax: "{{ route('admin.roles') }}",
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'created', name: 'created'},
                        {data: 'action', name: 'action'},

                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1},
                        {targets: 'no-sort', orderable: false}
                    ]
                });


            });

            function deleteRole(id) {


                var url_change_delete_form = '{{ route("admin.roles.delete",":id") }}';

                url_change_delete_form = url_change_delete_form.replace(':id', id);

                $('#form-delete-role').attr('action', url_change_delete_form);

            }

            function roleEdit(id) {

                var url_change_edit_form = '{{ route("admin.roles.update",":id") }}';

                url_change_edit_form = url_change_edit_form.replace(':id', id);

                $('#form-edit-role').attr('action', url_change_edit_form);


                var id = id;

                var url_update = '{{ route("admin.roles.edit",":id") }}';

                url_update = url_update.replace(':id', id);

                $.ajax({
                    url: url_update,
                    type: 'GET', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },

                    error: function (error) {
                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function (data) {
                        $('#name_edit').val(data.name);

                    }
                });


            }

        </script>

    @endpush


@endsection
