@extends('layouts.master')

@push('css')
    @include('layouts.extra.css.datatables')

    <!-- Treeview css -->
    <link rel="stylesheet" type="text/css" href="/bower_components/jstree/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/pages/treeview/treeview.css">
@endpush

@section('content')
    @include('partials.error.error')
    @include('CategoriesUi::modals.create-node')
    @include('CategoriesUi::modals.create-root')



    <div class="card">
        <div class="card-header text-end">
            <a href="{{route('admin.categories.index')}}" class="btn btn-info waves-effect mb-2">Liste des catégories</a>
            <a href="javascript:void(0)" class="btn btn-success waves-effect mb-2 add-category"> Ajouter une catégorie principale</a>
        </div>
        <div class="card-block">
            <div class="card-block tree-view">
                <div id="dragTree" class="mb-4">
                    <ul>
                        @foreach($categories as $item)
                            @php
                                $i=1;
                            @endphp
                            @include('CategoriesUi::sections.treeview.parent')
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>

    @push('js')
        @include('layouts.extra.js.datatables')
        <!-- Tree view js -->
        <script type="text/javascript" src="/bower_components/jstree/js/jstree.min.js"></script>
        <script type="text/javascript" src="/assets/pages/treeview/jquery.tree.js"></script>

        <script>

            $(document).ready(function (){
                $('#dragTree').jstree({
                    'core': {
                        'check_callback': true,
                        'themes': {
                            'responsive': false
                        }
                    },
                    'types': {
                        "default": {
                            "icon": "fa fa-folder text-primary",
                            "max_depth": 2
                        },
                    },
                    'plugins': ['types','contextmenu','dnd'],
                    "contextmenu": {
                        "items": function ($node) {
                            var tree = $('#dragTree').jstree(true);
                            if ($node.parents.length <= 2){
                                return {
                                    "Create_a_document": {
                                        "label": "Ajouter une catégorie",
                                        "icon": "feather icon-plus-square text-primary",
                                        "action": function (obj) {
                                            console.log($node.parents.length)

                                            CreateCategory($node.id)
                                        }
                                    }
                                };
                            }
                        }
                    }
                });
                $('#dragTree').on('ready.jstree', function () {
                    $("#dragTree").jstree("open_all");
                });
            })
            $('#dragTree').bind("move_node.jstree", function (event, data){
                var node_id = data.node.id
                var parent_id = data.parent
                console.log(node_id,parent_id)
                UpdateParent(node_id,parent_id)
            })

            function UpdateParent(node_id,parent_id){

                var url_update = '{{ route("admin.categories.update.parent",":category") }}';

                    url_update = url_update.replace(':category', node_id);
                    /*   console.log(id) */

                $.ajax({
                    url: url_update,
                    type: 'PUT', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    data: {parent_id:parent_id},

                    error: function (error) {
                        console.log(error)
                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function (data) {


                    }
                });

            }

            $('body').on('click','.add-category',function(){

                $('#modal-add_root_cat').modal('show');

            })



            function CreateRootCategory(id) {
                $('#modals-create_folder').modal('show');
            }

            function CreateCategory(id) {
                console.log('hello')

                $('#modal-add_cat').modal('show');

                var url_change_edit_form = '{{route('admin.categories.store.node',['category'=>':cat'])}}';

                url_change_edit_form = url_change_edit_form.replace(':cat', id);

                $('#form-add_cat').attr('action', url_change_edit_form);

            }





        </script>
    @endpush
@endsection
