 @extends('website.layouts.master')

 @section('content')

     <style>

          .ratio-vendor{
            aspect-ratio : 1/1;

          }

          .product-image{
            /* aspect-ratio : 1/1; */
            background: none;
            padding: 20px;
          }

          .lds-dual-ring {
              display: inline-block;
          }
          .lds-dual-ring:after {
              content: " ";
              display: block;
              width: 30px;
              height: 30px;
              margin: 8px;
              border-radius: 50%;
              border: 6px solid #fff;
              border-color: #fff transparent #fff transparent;
              animation: lds-dual-ring 1.2s linear infinite;
          }
          @keyframes lds-dual-ring {
              0% {
                  transform: rotate(0deg);
              }
              100% {
                  transform: rotate(360deg);
              }
          }

     </style>
     <section class="ptb-70">
         <div class="container">
             <div class="row">
                 {{-- <div class="col-xl-2 col-lg-3 mb-sm-30 col-lgmd-20per"> --}}

                 {{-- </div> --}}
                 <div class="col-xl-12 col-lg-12">
                     <div class="product-listing">
                         <div class="inner-listing">
                             <div class="row" id="loadData">
                             </div>
                             <div class="row justify-content-center" id="load_more_div">

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     @push('js')
         <script>
             function loadMoreData(id=0){
                 var query = {
                     id: id,
                     trier: '{{$sort_by}}',
                     per_page: '{{$per_page}}',
                 }
                 var url='{{ route("vendors")}}?'+$.param(query)
                 console.log(url)
                 $.ajax({
                     url: url,
                     type: 'GET',
                     dataType: 'json',
                     headers: {
                         'X-CSRF-Token': '{{ csrf_token() }}',
                     },

                     error: function(error) {
                         console.log(error)

                     },
                     success: function(data) {
                         $('#load_more_button').remove();
                         $('#loadData').append(data['vendors_div']);
                         $('#load_more_div').append(data['load_more_div']);
                     }
                 });

             }
             loadMoreData(0);
             $(document).on('click', '#load_more_button', function(){
                 var id = $(this).data('id');
                 //console.log(id);
                 $('#load_more_button').html('<span class="d-flex justify-content-center align-items-center"><span>{{__("Chargement en cours")}}</span><div class="lds-dual-ring"></div></span>');
                 loadMoreData(id);
             });
         </script>
     @endpush
 @endsection
