@extends('layouts.master')
@push('css')

@include('layouts.extra.css.datatables')

@include('layouts.extra.css.select2')


<style>

    .select2-selection__choice{
        background-color: #5897fb !important;
        border: none !important;
    }

    .select2-selection__choice__remove{
        color:  white !important;
    }

    .select2-selection__choice__remove:hover{
        background:  darkblue !important;
    }
  /*   .select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #5897fb !important;
    color: black;
    } */

  
 /*    td,th{
        white-space: wrap !important;
    } */


</style>


@endpush

@section('content')


{{-- <div class="row"> --}}


    <div class="card">
        <div class="card-header">
             <button type="button" class="btn btn-success waves-effect mb-2" data-bs-toggle="modal" data-bs-target="#modals-add-product" > Ajouter un produit</button>
             <button type="button" class="btn btn-info waves-effect mb-2" data-bs-toggle="modal" data-bs-target="#modals-add-product_file" > importer un fichier (csv,xlsx,xls)</button>
             @include('content.products.modals.create')
             @include('content.products.modals.edit')
             @include('content.products.modals.delete')
             @include('content.products.modals.file_upload')

        </div>
        <div class="card-block ">
            <!-- Basic table -->
            {{-- <section id="basic-datatable"> --}}
               {{--  <div class="row">
                    <div class="col-12">
                        <div class="card"> --}}
                            <table class="dataTable table table-inverse wrap table-border-style" id="products_table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th> identifiant </th>
                                    <th> Nom ar </th>
                                    <th> Nom fr </th>
                                    <th> ref </th>
                                    <th> Prix 12 mois </th>
                                    <th> Prix 24 mois </th>
                                    <th> Prix 36 mois </th>
                                    <th> Description ar</th>
                                    <th> Description fr </th>
                                    <th> Image </th>
                                    <th> Réduction </th>
                                    <th> Date de création</th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                             {{--    @foreach ($products as $p)
                                    <tr>
                                        <th></th>
                                        <th>{{$p->id}}</th>
                                        <th>{{$p->name_ar}}</th>
                                        <th>{{$p->name_fr}}</th>
                                       
                                        <th>{{$p->ref}}</th>
                                        <th><span class="badge badge-warning shadow-sm">{{number_format($p->price_first ,2 ,'.',',') }}</span> </th>
                                        <th><span class="badge badge-danger shadow-sm">{{number_format($p->price_second,2 ,'.',',')}}</span></th>
                                        <th><span class="badge badge-primary shadow-sm">{{number_format($p->price_thired ,2 ,'.',',')}}</span></th>
                                        <th>{{$p->desc_ar}}</th>
                                        <th>{{$p->desc_fr}}</th>
                                        <th>

                                          <a href="{{asset($p->image)}}" target="_blank">  <img src="{{asset($p->image)}}" alt="" class="img img-fluid image-hold" height="100"  width="100"  /></a>

                                        </th>
                                        <th>{{$p->discount}}</th>
                                        <th>{{$p->created_at}}</th>

                                        <th>

                                            <a href="javascript:;" class="item-edit text-info waves-effect" data-bs-toggle="modal"
                                               data-bs-target="#modals-edit-product" onclick="productEdit({{$p->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-edit font-small-4">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                    </path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <a href="javascript:;" class="item-edit text-danger waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#delete-product" onclick="deleteProduct({{$p->id}})">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                  viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                  stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  class="feather feather-archive font-small-4 mr-50">
                                                 <polyline points="21 8 21 21 3 21 3 8"></polyline>
                                                 <rect x="1" y="3" width="22" height="5"></rect>
                                                 <line x1="10" y1="12" x2="14" y2="12"></line>
                                             </svg>

                                         </a>



                                          
                                        </th>


                                    </tr>
                                @endforeach --}}
                                </tbody>
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
                    $(document).ready(function() {
                        $('.js-example-basic-single').select2({
                            placeholder: "Sélectionnez les catégories",
                            allowClear: true
                        });

                        $('.brands-select').select2({
                            placeholder: "Sélectionnez les marques",
                            allowClear: true
                        });
                    });


                    $('#products_table').DataTable({
                        dom: 'Blfrtip',
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        /* paging: false, */
                        language: {
                                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                        },
                        ajax:{
                            url : '/fa-pa/products',
                        },
                        columns: [
                            {data: 'responsive', className: 'responsive'}, 
                            {data: 'id', name: 'id'},
                            {data: 'name_ar', name: 'name_ar'},
                            {data: 'name_fr', name: 'name_fr'},
                            {data: 'ref', name: 'ref'},
                            {data: 'price_first', name: 'price_first'},
                            {data: 'price_second', name: 'price_second'},
                            {data: 'price_thired', name: 'price_thired'},
                            {data: 'desc_ar', name: 'desc_ar'},
                            {data: 'desc_fr', name: 'desc_fr'},
                            {data: 'image', name: 'image'},
                            {data: 'discount', name: 'discount'},
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

                function deleteProduct(id){


                var url_change_delete_form = '{{ route("admin.products.delete",":id") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':id', id);

                $('#form-delete-product').attr('action',url_change_delete_form );

                }

                function productEdit(id){

                var url_change_edit_form = '{{ route("admin.products.update",":id") }}';

                url_change_edit_form  =  url_change_edit_form .replace(':id', id);

                $('#form-edit-product').attr('action',url_change_edit_form );


                var id = id;

                var url_update = '{{ route("admin.products.edit",":id") }}';

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
                        var list_cat = data.list_cat;
                        var list_brands = data.list_brands;
                        var data = data.data;


                        $('#name_fr-edit').val(data.name_fr);
                        $('#name_ar-edit').val(data.name_ar);
                        $('#desc_ar-edit').text(data.desc_ar);
                        $('#desc_fr-edit').text(data.desc_fr);
                        $('#price_first-edit').val(data.price_first);
                        $('#price_second-edit').val(data.price_second);
                        $('#price_thired-edit').val(data.price_thired);
                        $('#discount-edit').val(data.discount);
                        $('#ref-edit').val(data.ref);



                        $(".select-category-edit").select2({width: '100%'});

                        $(".brands-select-edit").select2({width: '100%'});
                        

                        $('.select-category-edit').val(list_cat);
                        $('.select-category-edit').trigger('change');

                        
                        $('.brands-select-edit').val(list_brands);
                        $('.brands-select-edit').trigger('change');

                    }
                });






                }

        </script>

@endpush


@endsection
