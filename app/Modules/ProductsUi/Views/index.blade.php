@extends('layouts.master')

@push('css')
    @include('layouts.extra.css.datatables')


@endpush

@section('content')

    @include('partials.error.error')
    @include('ProductsUi::modals.delete')
    @include('ProductsUi::modals.images')
    @include('ProductsUi::modals.images.delete')
    @include('ProductsUi::modals.images.edit')
    @include('ProductsUi::modals.choose_vendor')
    @include('ProductsUi::modals.toggle')

    <div class="card">
        <div class="card-header text-end">
            <a href="javascript:void(0)" onclick="$('.dt-button').click()" class="btn  btn-secondary waves-effect mb-2"> Exporter .xls</a>

            <a href="javascript:void(0)" data-bs-toggle="modal"
               data-bs-target="#modals-slide-in-vendor-select" class="btn btn-success waves-effect mb-2">Ajouter un produit</a>

        </div>
        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="products_table">
                <thead>
                    <tr>
                        <th></th>
                        <th> identifiant </th>
                        <th> Nom ar </th>
                        <th> Nom fr </th>
                        <th> Slug </th>
                        <th> ref </th>
                        <th> Ancien prix </th>
                        <th> Prix </th>
                        <th>  Transport </th>
                        <th> Réduction </th>
                        <th> Actif </th>
                        <th> Description ar</th>
                        <th> Description fr </th>
                        {{-- <th> Images </th> --}}

                        <th> Date de création</th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

            </table>

        </div>
        <div class="card-footer text-start">

            <a href="{{route('admin.products.archived')}}" class="btn btn-danger waves-effect mb-2"> Produits archivés
            </a>
        </div>
    </div>


    @push('js')
        @include('layouts.extra.js.datatables')



        <script>
            function ToggleProduct(id){


                var url_change_delete_form = '{{ route("admin.products.toggle",":product") }}';

                url_change_delete_form  =  url_change_delete_form .replace(':product', id);

                $('#form-toggle-product').attr('action',url_change_delete_form );

            }
            $(document).ready(function() {



                $('body').on('click','.btn-delete',function(){

                    var id = $(this).data('id')

                    $('.type-input').val($(this).data('type'))

                    var url_change = "{{ route('admin.products.delete.image', ':id') }}";

                    url_change= url_change.replace(':id', id);

                    $('#form-delete-image').attr('action', url_change);

                })

                 $('body').on('click','.btn-edit',function(){

                    var id = $(this).data('id')

                    $('.type-input').val($(this).data('type'))

                    var url_change = "{{ route('admin.products.update.image', ':id') }}";

                    url_change = url_change.replace(':id', id);

                    $('#form-edit-image').attr('action', url_change);

                })

                $('#products_table').DataTable({
                    dom: 'Blfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    /* paging: false, */
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    ajax: {
                        url: '/cod-dash/produits',
                    },
                    columns: [{
                            data: 'responsive',
                            className: 'responsive'
                        },
                        {
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name_ar',
                            name: 'name_ar'
                        },
                        {
                            data: 'name_fr',
                            name: 'name_fr'
                        },
                        {
                            data: 'slug',
                            name: 'slug'
                        },
                        {
                            data: 'ref',
                            name: 'ref'
                        },
                        {
                            data: 'price_old',
                            name: 'price_old'
                        },
                        {
                            data: 'price',
                            name: 'price'
                        },  {
                            data: 'shipping',
                            name: 'shipping'
                        },
                        {
                            data: 'discount',
                            name: 'discount'
                        },
                        {
                            data: 'is_active',
                            name: 'is_active'
                        },
                        {
                            data: 'desc_ar',
                            name: 'desc_ar'
                        },
                        {
                            data: 'desc_fr',
                            name: 'desc_fr'
                        },
                        /*  {data: 'images', name: 'images'}, */

                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },

                    ],
                    buttons: [
                        {
                            text: 'Exporter tout',
                            className: 'visually-hidden',
                            action: function ( e, dt, button, config ) {
                                window.location = '/cod-dash/produits/export_all';
                            }
                        }
                    ],
                    columnDefs: [{
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: -1
                        },
                        {
                            targets: 'no-sort',
                            orderable: false
                        }
                    ]
                });


            });

            function deleteProduct(id) {


                var url_change_delete_form = "{{ route('admin.products.delete', ':id') }}";

                url_change_delete_form = url_change_delete_form.replace(':id', id);

                $('#form-delete-product').attr('action', url_change_delete_form);

            }

            function ShowImages(id) {


                var url_change = "{{ route('admin.products.store-image', ':id') }}";

                url_change = url_change.replace(':id', id);

                $('#form-images-product').attr('action', url_change);


                var url_change_get = "{{ route('admin.products.get-image', ':id') }}";

                url_change_get = url_change_get.replace(':id', id);


                $.ajax({
                    url: url_change_get,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },

                    error: function(error) {
                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function(data) {
                        $('.images-holder').empty();
                        var data = data;

                        if (data.main_image != null) {

                            var url_img = window.location.origin + '/' + data.main_image;
                            var modal_delete = 'data-bs-toggle="modal" data-bs-target="#delete-image"'
                            var modal_edit = 'data-bs-toggle="modal" data-bs-target="#edit-image"'

                            var btn_delete = '<button type="button" class="btn btn-danger btn-delete mb-2"' + modal_delete +
                                ' data-id="' + id +
                                '" data-type="main">Supprimer</button> <button type="button" class="btn btn-info  btn-edit mb-2" '+modal_edit+' data-id="' +
                                id + '" data-type="main">Modifier</button>'

                            var img_one = '<div class="col-lg-4 col-sm-6 text-center ">' + btn_delete +
                                '<a href="' + url_img + '" target="_blank"><img src="' + url_img +
                                '" class="img-thumbnail rounded border-success" alt=""></a></div>';

                            $('.images-holder').append(img_one);
                        }

                        $.each(data.images, function(idx, elem) {

                            if (elem.image != null) {

                                var url_img = window.location.origin + '/' + elem.image;
                                var modal_delete = 'data-bs-toggle="modal" data-bs-target="#delete-image"'
                                var modal_edit = 'data-bs-toggle="modal" data-bs-target="#edit-image"'

                                var btn_delete =
                                    '<button type="button" class="btn btn-danger btn-delete mb-2" '+modal_delete+' data-id="' + elem.id +
                                    '" data-type="other">Supprimer</button> <button type="button" class="btn btn-info  btn-edit mb-2" '+modal_edit+' data-id="' +
                                    elem.id + '" data-type="other">Modifier</button>'
                                var img_one = '<div class="col-lg-4 col-sm-6">' + btn_delete + '<a href="' +
                                    url_img + '" target="_blank"><img src="' + url_img +
                                    '" class="img-thumbnail rounded" alt=""></a></div>';

                                $('.images-holder').append(img_one);
                            }

                        });


                    }
                });




            }
        </script>

    @endpush

@endsection
