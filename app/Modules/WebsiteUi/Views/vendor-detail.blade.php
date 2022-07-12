 @extends('website.layouts.master')

 @push('css')
     <link rel="stylesheet" href="{{asset('website/vendor-detail.css')}}">
 @endpush
 @section('content')

     <style>


         .cover {
             background-image: url({{asset(\Illuminate\Support\Facades\Session::get('client_lang')?$vendor->images->where('name','banner')->first()->img_ar:$vendor->images->where('name','banner')->first()->img_fr)}});
             background-size: cover;
             background-repeat: no-repeat;
             background-position: 50% 50%;
             max-height: 300px;
         }

     </style>

     <div class="row ">
         <div class="col-sm-12 mx-auto">
             <!-- Profile widget -->
             <div class="bg-white shadow  overflow-hidden">
                 <div class="px-4 pt-0 pb-95 cover">
                     <div class="media profile-head">
                         <div class="profile mr-3"><img src="{{asset(\Illuminate\Support\Facades\Session::get('client_lang')?$vendor->images->where('name','banner')->first()->img_ar:$vendor->images->where('name','banner')->first()->img_fr)}}" alt="..." style="max-height: 150px;max-width: 150px;    background-size: cover;
             background-repeat: no-repeat;
             background-position: 50% 50%;" class="rounded mb-2 img-thumbnail"></div>
                         <div class="media-body mb-5  mx-1 text-white">
                             <h4 class="mt-0 mb-0 text-white">{{\Illuminate\Support\Facades\Session::get('client_lang')?$vendor->name_ar:$vendor->name_fr}}</h4>
                         </div>
                     </div>
                 </div>
                 <div class="px-4 py-3">
                     <div class="p-4 rounded shadow-sm bg-light">
                         <p class="font-italic mb-0">{{\Illuminate\Support\Facades\Session::get('client_lang')?$vendor->short_dec_ar:$vendor->short_dec_fr}}</p>
                     </div>
                 </div>
                 <div class="px-4 py-3 mt-3">
                     <div class="container">

                         <div class="row">
                             <div class="col-xl-2 col-lg-4 mb-sm-30 col-lgmd-20per">
                                 <div class="sidebar-block">
                                     <div class="sidebar-box listing-box mb-40"> <span class="opener plus"></span>
                                         <div class="sidebar-title">
                                             <h3><span>{{__("Catégories")}}</span></h3>
                                         </div>
                                         <div class="sidebar-contant">
                                             <ul>
                                                 @foreach ($categories as $c)
                                                     @if(\Illuminate\Support\Facades\Session::get('client_lang'))
                                                         <li><a class="category-link" {{$c->name_ar===$category?'style=font-weight:bolder':''}} data-id="{{$c->name_ar}}"  href="javascript:void(0)" >{{$c->name_ar}}

                                                             </a></li>
                                                     @else
                                                         <li><a class="category-link"  {{$c->name_fr===$category?'style=font-weight:bolder':''}} data-id="{{$c->name_fr}}"  href="javascript:void(0)" >{{$c->name_fr}}

                                                             </a></li>

                                                     @endif
                                                 @endforeach
                                             </ul>
                                         </div>
                                     </div>
                                     <div class="sidebar-box mb-40"> <span class="opener plus"></span>
                                         <div class="sidebar-title">
                                             <h3><span>{{__("faire des achats par")}}</span></h3>
                                         </div>
                                         <div class="sidebar-contant">
                                             <div class="price-range mb-30">
                                                 <input type="hidden" name="price_l" id="price_l">
                                                 <input type="hidden" name="price_u" id="price_u">

                                                 <div class="inner-title">{{__("Échelle des prix")}}</div>
                                                 <input class="price-txt" type="text" id="amount">
                                                 <div id="slider-range"></div>
                                                 <button type="submit" class="btn btn-color mt-2 filter-price">{{__("Filtrer")}}</button>
                                                 {{--  </form> --}}
                                             </div>
                                             <div class="mb-20">
                                                 <div class="inner-title">{{__("Marque")}}</div>
                                                 <ul>
                                                     @foreach ($brands as $item)

                                                         @if(\Illuminate\Support\Facades\Session::get('client_lang'))
                                                             <li><a  class="brand-link" {{$item->name_ar===$brand?'style=font-weight:bolder':''}} data-id="{{$item->name_ar}}">{{$item->name_ar}}

                                                                 </a></li>

                                                         @else
                                                             <li><a  class="brand-link" {{$item->name_fr===$brand?'style=font-weight:bolder':''}} data-id="{{$item->name_fr}}">{{$item->name_fr}}

                                                                 </a></li>

                                                         @endif
                                                     @endforeach
                                                 </ul>
                                             </div>


                                             <a href="{{route('vendor-detail',['vendor'=>$vendor->name_fr])}}" class="btn btn-color">{{__("Tous")}}</a> </div>

                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-10 col-lg-8 col-lgmd-80per">
                                 <div class="shorting mb-30">
                                     <div class="row">
                                         <div class="col-lg-6">
                                             <div class="view">
                                                 <div class="list-types grid active "> <a href="javascript:;">
                                                         <div class="grid-icon list-types-icon"></div>
                                                     </a>
                                                 </div>

                                             </div>
                                             <div class="short-by float-right-sm"> <span>{{__("Trier par")}} :</span>
                                                 <div class="select-item select-dropdown">
                                                     {{-- <fieldset> --}}
                                                     <select  name="speed" id="sort-price" {{-- class="option-drop" --}}>
                                                         <option value="name_fr-asc" @if ($sort_by == 'name_fr-asc' ) selected  @endif >{{__("Nom (A à Z)")}}</option>
                                                         <option value="name_fr-desc" @if ($sort_by == 'name_fr-desc' ) selected  @endif>{{__("Nom (Z à A)")}}</option>
                                                         <option value="price-asc" @if ($sort_by == 'price-asc' ) selected  @endif>{{__("Prix (Bas > Elevé)")}}</option>
                                                         <option value="price-desc" @if ($sort_by == 'price-desc' ) selected  @endif>{{__("Prix (Elevé > Bas)")}}</option>
                                                         <option value="rating-desc"  @if ($sort_by == 'rating-desc' ) selected  @endif>{{__("Evaluation (La plus élevée)")}}</option>
                                                         <option value="rating-asc" @if ($sort_by == 'rating-asc' ) selected  @endif>{{__("Evaluation (La plus basse)")}}</option>
                                                     </select>
                                                     {{--  </fieldset> --}}
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-lg-6">
                                             <div class="show-item right-side float-left-sm"> <span>{{__("Afficher")}} :</span>
                                                 <div class="select-item select-dropdown">
                                                     {{-- <fieldset> --}}
                                                     <form  id="form-per">
                                                         <select  id="show-item" {{-- class="option-drop" --}}>
                                                             <option value="24" @if ($per_page == 24 ) selected  @endif>24</option>
                                                             <option value="12" @if ($per_page == 12 ) selected  @endif>12</option>
                                                             <option value="6"  @if ($per_page == 6  )  selected  @endif>6</option>
                                                         </select>
                                                     </form>
                                                     {{--  </fieldset> --}}
                                                 </div>
                                                 <span>{{__("Par Page")}}</span>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="product-listing">
                                     <div class="inner-listing">
                                         <div class="row">
                                             @if ($products->isNotEmpty())

                                                 @foreach ($products as $b)

                                                     <div class="col-md-4 col-6 item-width mb-30">
                                                         <div class="product-item">
                                                             {{-- <div class="main-label Nouveau-label"><span>Nouveau</span></div> --}}
                                                             <div class="product-image"> <a href="{{route('product',$b->slug)}}">
                                                                     @if ($b->image != null)
                                                                         <img src="{{asset($b->image)}}" style="    background-repeat: no-repeat;
    background-position: 50% 50%;
    ;" class="image-home" alt="Stylexpo">
                                                                     @else
                                                                         <img style="background-repeat: no-repeat;
    background-position: 50% 50%;
    ;" class="image-home" src="/website/assets/images/product/product_1_md.jpg" alt="Stylexpo">
                                                                     @endif
                                                                 </a>
                                                                 <div class="product-detail-inner">
                                                                     <div class="detail-inner-left align-center">
                                                                         <ul>
                                                                             <li class="pro-cart-icon">
                                                                                 <form>
                                                                                     <button type="button" data-id="{{$b->id}}" class="add-to-cart" title="Ajouter au panier"><span></span>{{__("Ajouter au panier")}}</button>
                                                                                 </form>
                                                                             </li>
                                                                             {{-- <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li> --}}
                                                                             {{--    <li class="pro-compare-icon"><a href="{{route('compare')}}" title="Compare"></a></li> --}}
                                                                         </ul>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="product-item-details">
                                                                 <div class="product-item-name"> <a href="{{route('product',$b->slug)}}">{{\Illuminate\Support\Facades\Session::get('client_lang')?$b->name_ar:$b->name_fr}}</a> </div>
                                                                 <div class="price-box"> <span class="price">{{number_format($b->price, 2, '.', ',')}} {{__("DA")}} </span> <del class="price old-price"> {{number_format($b->price_old, 2, '.', ',')}}
                                                                         {{__("DA")}}</del> </div>
                                                             </div>
                                                         </div>
                                                     </div>

                                                 @endforeach

                                             @else

                                                 <div class="col-12 text-center">
                                                     <img src="{{asset('data-none.png')}}" style="width: 200px"  alt="">
                                                     <h4 class="section-title">{{__("aucune donnée n'a été trouvée")}}</h4>

                                                 </div>

                                             @endif



                                         </div>
                                         <div class="row">
                                             <div class="col-12">
                                                 <div class="pagination-bar">
                                                     {{$products->appends($_GET)->links('pagination::website.shop')}}
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>




  @push('js')

    @include('WebsiteUi::js.shop')

  @endpush

 @endsection
