@extends('layouts.master')


@push('css')

        @include('layouts.extra.css.datatables')
        @include('layouts.extra.css.select2')
       


@endpush

@section('content')


    {{-- <div class="row"> --}}

        @include('content.orders.modals.edit')
        @include('content.orders.modals.delete')
        
    <div class="card">
        <div class="card-block table-border-style">
        
        <!-- Basic table -->
            {{-- <section id="basic-datatable"> --}}
            {{--  <div class="row">
                 <div class="col-12">
                     <div class="card"> --}}
            <table class="table table-inverse" id="orders_table">
                <thead>
                <tr>
                    <th></th>
                    <th> identifiant</th>
                    <th> Nom</th>
                    <th> Téléphone</th>
                    <th> Réf</th>
                    <th> Détails</th>
                    <th> Statut</th>
                    <th> Date de création</th>
                    <th> Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $p)
                    <tr>
                        <th></th>
                        <th>{{$p->id}}</th>
                        <th>{{$p->name}}</th>
                        <th>{{$p->phone}}</th>
                        <th>{{$p->ref}}</th>
                        <th>{{$p->details}}</th>
                        <th>
                            @if ( $p->status == 'pending')
                               en attente
                            @elseif ($p->status == 'confirmed')
                               confirmé
                            @elseif ($p->status == 'canceled')
                               annulé
                            @else
                               terminé
                            @endif
                        </th>
                        <th>{{$p->created_at}}</th>

                        <th>

                            <a href="javascript:void(0);" class="item-edit text-info" id="edit-order{{$p->id}}" data-bs-toggle="modal"
                               data-bs-target="#modals-slide-in-product-edit" data-status="{{$p->status}}" onclick="orderEdit({{$p->id}})">

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

                            <a href="javascript:void(0);" class="item-edit text-danger" data-bs-toggle="modal"
                               data-bs-target="#archive-order"  onclick="archiveOrder({{$p->id}})">
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



                            {{--@include('content.orders.modals.delete')--}}
                        </th>


                    </tr>
                @endforeach
                </tbody>
            </table>

           
            {{--        </div>
               </div>
           </div> --}}



            {{--  </section> --}}
        </div>
      {{--   <div class="card-footer text-center">
            <div class="text-center">
                {{$orders->links('pagination::bootstrap-4')}}
            </div>
        </div>
         --}}
    </div>

    {{--
    </div> --}}



    @push('js')

    @include('layouts.extra.js.datatables')
    @include('layouts.extra.js.select2')



        <script>

            $(document).ready(function () {

               
                $('#product').select2({
                    placeholder: "Sélectionnez un produit",
                    allowClear: true,
                    theme:'bootstrap4',
                    dropdownParent: $('#modals-slide-in-product-edit')
                });
                    
                    
                $('#orders_table').DataTable({
                    dom: 'Blfrtip',
                    responsive: true,
                    processing: true,
           /*          paging: false, */
                    language: {
                                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1},
                        {targets: 'no-sort', orderable: false}
                    ]
                });

            });

            function archiveOrder(id) {

                // to use for delete order modal
                var url_change_delete_form = '{{ route("admin.orders.delete",":id") }}';

                url_change_delete_form = url_change_delete_form.replace(':id', id);

                $('#form-delete-order').attr('action', url_change_delete_form);

            }

            function orderEdit(id){

                var url_change_edit_form = '{{ route("admin.orders.update",":id") }}';

                url_change_edit_form  =  url_change_edit_form .replace(':id', id);

                $('#form-edit-order').attr('action',url_change_edit_form );


                $('#status').val($('#edit-order'+id).data('status'));

                var id = id;

                var url_update = '{{ route("admin.orders.edit",":id") }}';

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
                        var data = data.data;

                        $('#name-order-edit').val(data.name);
                        $('#details').text(data.details);
  
                        $('#product').val(data.product_id);
                        $('#product').trigger('change');

                    }
                });


            }

        </script>

    @endpush


@endsection
