@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.datatables')
    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')
    @include('BrandsUi::modals.brand.edit')
    @include('BrandsUi::modals.brand.restore')


{{-- <div class="row"> --}}


    <div class="card">
        <div class="card-block table-border-style">
            <!-- Basic table -->
            {{-- <section id="basic-datatable"> --}}
               {{--  <div class="row">
                    <div class="col-12">
                        <div class="card"> --}}
                            <table class="table table-inverse" id="brands_table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th> identifiant </th>
                                    <th> Nom en français </th>
                                    <th> Nom en arabe </th>
                                    <th> Image </th>
                                    <th> Date de création</th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach ($brands as $brand)--}}
{{--                                    <tr>--}}
{{--                                        <th></th>--}}
{{--                                        <th>{{$brand->id}}</th>--}}
{{--                                        <th>{{$brand->name_fr}}</th>--}}
{{--                                        <th>{{$brand->name_ar}}</th>--}}
{{--                                        <th>{{$brand->created_at}}</th>--}}

{{--                                        <th>--}}

{{--                                            <a href="javascript:void(0);" class="item-edit text-info waves-effect" data-bs-placement="top" title="modifier" data-bs-toggle="modal"--}}
{{--                                               data-bs-target="#modals-edit-brand" onclick="BrandEdit({{$brand->id}})">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                     class="feather feather-edit font-small-4">--}}
{{--                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">--}}
{{--                                                    </path>--}}
{{--                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">--}}
{{--                                                    </path>--}}
{{--                                                </svg>--}}
{{--                                            </a>--}}

{{--                                            <a href="javascript:void(0);" class="item-edit text-danger waves-effect" data-bs-placement="top" title="supprimer" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#delete-brand" onclick="deleteBrand({{$brand->id}})">--}}
{{--                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                  viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                                  stroke-width="2" stroke-linecap="round"--}}
{{--                                                  stroke-linejoin="round"--}}
{{--                                                  class="feather feather-archive font-small-4 mr-50">--}}
{{--                                                 <polyline points="21 8 21 21 3 21 3 8"></polyline>--}}
{{--                                                 <rect x="1" y="3" width="22" height="5"></rect>--}}
{{--                                                 <line x1="10" y1="12" x2="14" y2="12"></line>--}}
{{--                                             </svg>--}}

{{--                                         </a>--}}

{{--                                        </th>--}}


{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                 {{--        </div>
                    </div>
                </div> --}}



           {{--  </section> --}}
        </div>

    {{--     <div class="card-footer text-center">
            <div class="text-center">
                {{$brands->links('pagination::bootstrap-4')}}
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
                    $('#brands_table').DataTable({
                        dom: 'Bfrtip',
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        /* paging: false, */
                        language: {
                            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                        },
                        ajax:{
                            url : '{{route('admin.brands.archived')}}',
                        },
                        buttons: [
                            // {
                            //     extend: 'excel',
                            //     text:'Exporter .xls',
                            //     className: 'btn block btn-success rounded m-r-30',
                            //     exportOptions: {
                            //         columns: [1,2,3,5]
                            //     },
                            //     init: function(api, node, config) {
                            //         $(node).removeClass('dt-button')
                            //     }
                            // },
                        ],
                        columns: [
                            {data: 'responsive', className: 'responsive'},
                            {data: 'id', name: 'id'},
                            {data: 'name_fr', name: 'name_fr'},
                            {data: 'name_ar', name: 'name_ar'},
                            {data: 'image', name: 'image'},
                            {data: 'created_at', name: 'created_at'},
                            {data: 'action', name: 'action'},
                        ],
                        columnDefs: [
                            {responsivePriority: 1, targets: 0},
                            {responsivePriority: 2, targets: 1},
                            {targets: 'no-sort', orderable: false}
                        ]
                    });


                });

                function RestoreBrand(id){


                var url_change_delete_form = '{{ route("admin.brands.restore",":id") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':id', id);

                $('#form-restore-brand').attr('action',url_change_delete_form );

                }

                function BrandEdit(id){

                var url_change_edit_form = '{{ route("admin.brands.update",":id") }}';

                url_change_edit_form  =  url_change_edit_form .replace(':id', id);

                $('#form-edit-brand').attr('action',url_change_edit_form );


                var id = id;

                var url_update = '{{ route("admin.brands.edit",":id") }}';

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

                        var data = data;

                        $('#name_fr_edit').val(data.name_fr);
                        $('#name_ar_edit').val(data.name_ar);
                    }
                });


                }

        </script>

@endpush


@endsection
