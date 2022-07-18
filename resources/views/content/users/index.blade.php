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

    @include('content.users.models.create')
    @include('content.users.models.edit')
    @include('content.users.models.delete')
    {{--    @include('content.users.models.archive')--}}
    {{--    @include('content.users.models.unarchive')--}}
    {{--    @include('content.users.models.block')--}}
    {{--    @include('content.users.models.unblock')--}}
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
{{--     <div class="row">

        <div class="col-xl-4 col-md-6">
            <div class="card card-green text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="m-b-0">{{$users_count}}</h4>
                            <p class="m-b-0">nombre d'Utilisateurs actives</p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fas fa-user f-20"></i>
                        </div>
                    </div>
                    <div id="Widget-line-chart1" class="chart-line chart-shadow" style="width:100%;height:75px">
                        <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%"
                             class="ct-chart-line" style="width: 100%; height: 100%;">
                            <g class="ct-grids">
                                <line x1="10" x2="10" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="32.875" x2="32.875" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="55.75" x2="55.75" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="78.625" x2="78.625" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="101.5" x2="101.5" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="124.375" x2="124.375" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="147.25" x2="147.25" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="170.125" x2="170.125" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="193" x2="193" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="215.875" x2="215.875" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="238.75" x2="238.75" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="261.625" x2="261.625" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="284.5" x2="284.5" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                            </g>
                            <g>
                                <g class="ct-series ct-series-a">
                                    <path
                                        d="M10,51.667C17.625,54.722,25.25,60.833,32.875,60.833C40.5,60.833,48.125,33.333,55.75,33.333C63.375,33.333,71,42.5,78.625,42.5C86.25,42.5,93.875,15,101.5,15C109.125,15,116.75,42.5,124.375,42.5C132,42.5,139.625,33.333,147.25,33.333C154.875,33.333,162.5,42.5,170.125,42.5C177.75,42.5,185.375,24.167,193,24.167C200.625,24.167,208.25,38.833,215.875,38.833C223.5,38.833,231.125,33.333,238.75,33.333C246.375,33.333,254,46.167,261.625,46.167C269.25,46.167,276.875,46.167,284.5,46.167"
                                        class="ct-line"></path>
                                    <line x1="10" y1="51.66666666666667" x2="10.01" y2="51.66666666666667"
                                          class="ct-point" ct:value="50"></line>
                                    <line x1="32.875" y1="60.833333333333336" x2="32.885" y2="60.833333333333336"
                                          class="ct-point" ct:value="45"></line>
                                    <line x1="55.75" y1="33.333333333333336" x2="55.76" y2="33.333333333333336"
                                          class="ct-point" ct:value="60"></line>
                                    <line x1="78.625" y1="42.5" x2="78.635" y2="42.5" class="ct-point"
                                          ct:value="55"></line>
                                    <line x1="101.5" y1="15" x2="101.51" y2="15" class="ct-point" ct:value="70"></line>
                                    <line x1="124.375" y1="42.5" x2="124.385" y2="42.5" class="ct-point"
                                          ct:value="55"></line>
                                    <line x1="147.25" y1="33.333333333333336" x2="147.26" y2="33.333333333333336"
                                          class="ct-point" ct:value="60"></line>
                                    <line x1="170.125" y1="42.5" x2="170.135" y2="42.5" class="ct-point"
                                          ct:value="55"></line>
                                    <line x1="193" y1="24.166666666666664" x2="193.01" y2="24.166666666666664"
                                          class="ct-point" ct:value="65"></line>
                                    <line x1="215.875" y1="38.83333333333333" x2="215.885" y2="38.83333333333333"
                                          class="ct-point" ct:value="57"></line>
                                    <line x1="238.75" y1="33.333333333333336" x2="238.76" y2="33.333333333333336"
                                          class="ct-point" ct:value="60"></line>
                                    <line x1="261.625" y1="46.16666666666667" x2="261.635" y2="46.16666666666667"
                                          class="ct-point" ct:value="53"></line>
                                    <line x1="284.5" y1="46.16666666666667" x2="284.51" y2="46.16666666666667"
                                          class="ct-point" ct:value="53"></line>
                                </g>
                            </g>
                            <g class="ct-labels"></g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card card-yellow text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="m-b-0">{{$users_count_blocked}}</h4>
                            <p class="m-b-0">nombre d'Utilisateurs bloqués</p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fas fa-user f-20"></i>
                        </div>
                    </div>
                    <div id="Widget-line-chart2" class="chart-line chart-shadow" style="width:100%;height:75px">
                        <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%"
                             class="ct-chart-line" style="width: 100%; height: 100%;">
                            <g class="ct-grids">
                                <line x1="10" x2="10" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="32.875" x2="32.875" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="55.75" x2="55.75" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="78.625" x2="78.625" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="101.5" x2="101.5" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="124.375" x2="124.375" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="147.25" x2="147.25" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="170.125" x2="170.125" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="193" x2="193" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="215.875" x2="215.875" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="238.75" x2="238.75" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="261.625" x2="261.625" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="284.5" x2="284.5" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                            </g>
                            <g>
                                <g class="ct-series ct-series-a">
                                    <path
                                        d="M10,51.667C17.625,54.722,25.25,60.833,32.875,60.833C40.5,60.833,48.125,33.333,55.75,33.333C63.375,33.333,71,42.5,78.625,42.5C86.25,42.5,93.875,15,101.5,15C109.125,15,116.75,42.5,124.375,42.5C132,42.5,139.625,33.333,147.25,33.333C154.875,33.333,162.5,42.5,170.125,42.5C177.75,42.5,185.375,24.167,193,24.167C200.625,24.167,208.25,38.833,215.875,38.833C223.5,38.833,231.125,33.333,238.75,33.333C246.375,33.333,254,46.167,261.625,46.167C269.25,46.167,276.875,46.167,284.5,46.167"
                                        class="ct-line"></path>
                                    <line x1="10" y1="51.66666666666667" x2="10.01" y2="51.66666666666667"
                                          class="ct-point" ct:value="50"></line>
                                    <line x1="32.875" y1="60.833333333333336" x2="32.885" y2="60.833333333333336"
                                          class="ct-point" ct:value="45"></line>
                                    <line x1="55.75" y1="33.333333333333336" x2="55.76" y2="33.333333333333336"
                                          class="ct-point" ct:value="60"></line>
                                    <line x1="78.625" y1="42.5" x2="78.635" y2="42.5" class="ct-point"
                                          ct:value="55"></line>
                                    <line x1="101.5" y1="15" x2="101.51" y2="15" class="ct-point" ct:value="70"></line>
                                    <line x1="124.375" y1="42.5" x2="124.385" y2="42.5" class="ct-point"
                                          ct:value="55"></line>
                                    <line x1="147.25" y1="33.333333333333336" x2="147.26" y2="33.333333333333336"
                                          class="ct-point" ct:value="60"></line>
                                    <line x1="170.125" y1="42.5" x2="170.135" y2="42.5" class="ct-point"
                                          ct:value="55"></line>
                                    <line x1="193" y1="24.166666666666664" x2="193.01" y2="24.166666666666664"
                                          class="ct-point" ct:value="65"></line>
                                    <line x1="215.875" y1="38.83333333333333" x2="215.885" y2="38.83333333333333"
                                          class="ct-point" ct:value="57"></line>
                                    <line x1="238.75" y1="33.333333333333336" x2="238.76" y2="33.333333333333336"
                                          class="ct-point" ct:value="60"></line>
                                    <line x1="261.625" y1="46.16666666666667" x2="261.635" y2="46.16666666666667"
                                          class="ct-point" ct:value="53"></line>
                                    <line x1="284.5" y1="46.16666666666667" x2="284.51" y2="46.16666666666667"
                                          class="ct-point" ct:value="53"></line>
                                </g>
                            </g>
                            <g class="ct-labels"></g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card card-red text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="m-b-0">{{$users_count_archived}}</h4>
                            <p class="m-b-0">nombre d'Utilisateurs archivés</p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fas fa-archive f-20"></i>
                        </div>
                    </div>
                    <div id="Widget-line-chart3" class="chart-line chart-shadow" style="width:100%;height:75px">
                        <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%"
                             class="ct-chart-line" style="width: 100%; height: 100%;">
                            <g class="ct-grids">
                                <line x1="10" x2="10" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="32.875" x2="32.875" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="55.75" x2="55.75" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="78.625" x2="78.625" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="101.5" x2="101.5" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="124.375" x2="124.375" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="147.25" x2="147.25" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="170.125" x2="170.125" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="193" x2="193" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="215.875" x2="215.875" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="238.75" x2="238.75" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="261.625" x2="261.625" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                                <line x1="284.5" x2="284.5" y1="15" y2="70" class="ct-grid ct-horizontal"></line>
                            </g>
                            <g>
                                <g class="ct-series ct-series-a">
                                    <path
                                        d="M10,51.667C17.625,54.722,25.25,60.833,32.875,60.833C40.5,60.833,48.125,33.333,55.75,33.333C63.375,33.333,71,42.5,78.625,42.5C86.25,42.5,93.875,15,101.5,15C109.125,15,116.75,42.5,124.375,42.5C132,42.5,139.625,33.333,147.25,33.333C154.875,33.333,162.5,42.5,170.125,42.5C177.75,42.5,185.375,24.167,193,24.167C200.625,24.167,208.25,38.833,215.875,38.833C223.5,38.833,231.125,33.333,238.75,33.333C246.375,33.333,254,46.167,261.625,46.167C269.25,46.167,276.875,46.167,284.5,46.167"
                                        class="ct-line"></path>
                                    <line x1="10" y1="51.66666666666667" x2="10.01" y2="51.66666666666667"
                                          class="ct-point" ct:value="50"></line>
                                    <line x1="32.875" y1="60.833333333333336" x2="32.885" y2="60.833333333333336"
                                          class="ct-point" ct:value="45"></line>
                                    <line x1="55.75" y1="33.333333333333336" x2="55.76" y2="33.333333333333336"
                                          class="ct-point" ct:value="60"></line>
                                    <line x1="78.625" y1="42.5" x2="78.635" y2="42.5" class="ct-point"
                                          ct:value="55"></line>
                                    <line x1="101.5" y1="15" x2="101.51" y2="15" class="ct-point" ct:value="70"></line>
                                    <line x1="124.375" y1="42.5" x2="124.385" y2="42.5" class="ct-point"
                                          ct:value="55"></line>
                                    <line x1="147.25" y1="33.333333333333336" x2="147.26" y2="33.333333333333336"
                                          class="ct-point" ct:value="60"></line>
                                    <line x1="170.125" y1="42.5" x2="170.135" y2="42.5" class="ct-point"
                                          ct:value="55"></line>
                                    <line x1="193" y1="24.166666666666664" x2="193.01" y2="24.166666666666664"
                                          class="ct-point" ct:value="65"></line>
                                    <line x1="215.875" y1="38.83333333333333" x2="215.885" y2="38.83333333333333"
                                          class="ct-point" ct:value="57"></line>
                                    <line x1="238.75" y1="33.333333333333336" x2="238.76" y2="33.333333333333336"
                                          class="ct-point" ct:value="60"></line>
                                    <line x1="261.625" y1="46.16666666666667" x2="261.635" y2="46.16666666666667"
                                          class="ct-point" ct:value="53"></line>
                                    <line x1="284.5" y1="46.16666666666667" x2="284.51" y2="46.16666666666667"
                                          class="ct-point" ct:value="53"></line>
                                </g>
                            </g>
                            <g class="ct-labels"></g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-success waves-effect mb-2" data-bs-toggle="modal"
                    data-bs-target="#modals-add-user"> Ajouter un utilisateur
            </button>
        </div>
        <div class="card-block table-border-style table-responsive">
            <!-- Basic table -->
            {{-- <section id="basic-datatable"> --}}
            {{--  <div class="row">
                 <div class="col-12">
                     <div class="card"> --}}
            <table class="table table-inverse" id="users_table">
                <thead>
                <tr>
                    <th></th>
                    <th> identifiant</th>
                    <th> Nom</th>
                    <th> Email</th>
                    <th> Rôle</th>
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

                $(document).ready(function () {
                    $('.js-example-basic-single').select2({
                        placeholder: "Sélectionnez les rôles",
                        allowClear: true
                    });
                    $('.roles_select_edit').select2({
                        placeholder: "Sélectionnez les rôles",
                        allowClear: true
                    });
                });


                $('#users_table').DataTable({
                    dom: 'Blfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax: "{{ route('admin.users') }}",
                    columns: [
                        {data: 'responsive', className: 'responsive'},
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'roles', name: 'roles'},
                        {data: 'action', name: 'action'},

                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1},
                        {targets: 'no-sort', orderable: false}
                    ]
                });


            });


            {{--function archiveUser(id) {--}}


            {{--    var url_change_delete_form = '{{ route("users.archive",":user") }}';--}}

            {{--    url_change_delete_form = url_change_delete_form.replace(':user', id);--}}

            {{--    $('#form-archive-user').attr('action', url_change_delete_form);--}}

            {{--}--}}

            {{--function unarchiveUser(id) {--}}


            {{--    var url_change_delete_form = '{{ route("users.unarchive",":user") }}';--}}

            {{--    url_change_delete_form = url_change_delete_form.replace(':user', id);--}}

            {{--    $('#form-unarchive-user').attr('action', url_change_delete_form);--}}

            {{--}--}}

            {{--function blockUser(id) {--}}


            {{--    var url_change_delete_form = '{{ route("users.block",":user") }}';--}}

            {{--    url_change_delete_form = url_change_delete_form.replace(':user', id);--}}

            {{--    $('#form-block-user').attr('action', url_change_delete_form);--}}

            {{--}--}}


            {{--function unblockUser(id) {--}}


            {{--    var url_change_delete_form = '{{ route("users.unblock",":user") }}';--}}

            {{--    url_change_delete_form = url_change_delete_form.replace(':user', id);--}}

            {{--    $('#form-unblock-user').attr('action', url_change_delete_form);--}}

            {{--}--}}

            function deleteUser(id) {


                var url_change_delete_form = '{{ route("admin.users.delete",":id") }}';

                url_change_delete_form = url_change_delete_form.replace(':id', id);

                $('#form-delete-user').attr('action', url_change_delete_form);

            }

            function userEdit(id) {
                console.log(id);

                var url_change_edit_form = '{{ route("admin.users.update",":id") }}';

                url_change_edit_form = url_change_edit_form.replace(':id', id);

                $('#form-edit-user').attr('action', url_change_edit_form);


                var id = id;

                var url_update = '{{ route("admin.users.edit",":id") }}';

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
                        console.log(data);
                        var list_roles = data.list_roles;
                        var data = data;


                        $('#name_edit').val(data.name);
                        $('#email_edit').val(data.email);


                        // $(".select-category-edit").select2({width: '100%'});

                        $('.roles_select_edit').val(list_roles);
                        $('.roles_select_edit').trigger('change');

                    }
                });


            }

        </script>

    @endpush


@endsection
