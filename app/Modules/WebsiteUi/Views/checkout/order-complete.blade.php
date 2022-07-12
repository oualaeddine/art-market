@extends('website.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{asset('website/order-overview.css')}}">
@endpush
@section('content')
    <section class="checkout-section ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="checkout-step mb-40">
            <ul>
              <li>  <a href="{{route('checkout')}}">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">1</div>
                </div>
                <span>{{__('Expédition')}}</span> </a> </li>
              <li>  <a href="{{route('checkout.overview',$orders->first()->tracking_code)}}">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">2</div>
                </div>
                <span>{{__('Aperçu de la commande')}}</span> </a> </li>
    {{--           <li> <a href="payment.html">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">3</div>
                </div>
                <span>Payment</span> </a> </li> --}}
              <li class="active"> <a href="{{route('checkout.complete',$orders->first()->tracking_code)}}">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">3</div>
                </div>
                <span>{{__('Commande terminée')}}</span> </a> </li>
              <li>
                <div class="step">
                  <div class="line"></div>
                </div>
              </li>
            </ul>
            <hr>
          </div>
          <div class="checkout-content">
            <div class="row">
              <div class="col-12">
                <div class="heading-part align-center">
                  <h2 class="heading">{{__('Commande terminée')}}</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 mb-sm-30">
                <div id="form-print" class="admission-form-wrapper">
                  <div class="cart-item-table complete-order-table commun-table mb-30">
                    <div class="table-responsive">
                      <table class="table">
                          <thead>
                          <tr>
                              <th>{{__('Produit')}}</th>
                              <th>{{__('Détail du produit')}}</th>
                              <th>{{__('Quantité')}}</th>
                              <th>{{__('Sous-total')}}</th>
                              {{--  <th>Action</th> --}}
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($orders as $order)
                              @foreach($order->orderProducts as $item)
                                  <tr>
                                      <td>
                                          <a href="{{route('product',$item->product->slug)}}">
                                              <div class="product-image">
                                                  @if ($item->product->image)
                                                      <img style="object-fit: cover" alt="Stylexpo" src="{{asset($item->product->image)}}" class="">
                                                  @else
                                                      <img style="object-fit: cover" alt="Stylexpo" src="website/assets/images/product/product_1_md.jpg">
                                                  @endif

                                              </div>
                                          </a>
                                      </td>
                                      <td>
                                          <div class="product-title">
                                              <h4><a href="{{route('product',$item->product->slug)}}">{{\Illuminate\Support\Facades\Session::get('client_lang')?$item->product->name_ar:$item->product->name_fr}}</a></h4>

                                              {{--    <div class=""><span class="text-muted mr-2">Color :</span>gray</div>
                                                 <div class=""><span class="text-muted mr-2">Size :</span>XL</div> --}}
                                          </div>
                                      </td>
                                      {{--  <td>
                                         <ul>
                                           <li>
                                             <div class="base-price price-box">
                                               <span class="price">DA {{$item->price}}</span>
                                             </div>
                                           </li>
                                         </ul>
                                       </td> --}}
                                      <td>
                                          <div class="total-price price-box">
                                              <span class="price">{{$item->qty??$item->quantity}}</span>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="total-price price-box">
                                              <span class="price">{{number_format($item->price * ($item->qty??$item->quantity), 2, '.', ',') }} {{__("DA")}}</span>
                                          </div>
                                      </td>
                                      {{-- <td>
                                        @if ($cart->count() > 1)
                                            <i title="Remove Item From Cart" data-id="{{$item->id}}" class="fa fa-trash cart-remove-item"></i>
                                        @endif

                                      </td> --}}
                                  </tr>
                              @endforeach
                          @endforeach
                          </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="complete-order-detail commun-table mb-30">
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td><b>{{__('Date de commande')}} :</b></td>
                            <td>{{date('d M Y', strtotime($orders->first()->created_at))}}</td>
                          </tr>
                          <tr>
                            <td><b>{{__('Total')}} :</b></td>
                            <td><div class="price-box"> <span class="price">{{number_format($orders->sum('total'), 2, '.', ',')}} {{__("DA")}}</span> </div></td>
                          </tr>
                          <tr>
                            <td><b>{{__('Paiement')}} :</b></td>
                            <td>{{$orders->first()->mode_payment}}</td>
                          </tr>
                          <tr>
                            <td><b>{{__('N° de commande')}} :</b></td>
                            <td>{{ $orders->first()->tracking_code}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="mb-30">
                    <div class="heading-part">
                      <h5 class="sub-heading text-danger">{{__("Assurez-vous d'imprimer cette page ou d'enregistrer le N° de commande. pour vérifier l'état d'avancement de la commande dans l'onglet")}}
                          <a href="{{route('order-tracking')}}"> {{__("suivez")}}</a></h5>
                    </div>
                    <hr>
                  {{--   <p class="mt-20">Quisque id fermentum tellus. Donec fringilla mauris nec ligula maximus sodales. Donec ac felis nunc. Fusce placerat volutpat risus, ac fermentum ex tempus eget.</p> --}}
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="print-btn">
                      <button onclick="printDiv('form-print')" class="btn btn-color" type="button">{{__('Imprimer')}}</button>
                      <div class="right-side float-none-xs mt-sm-30">
                        <a class="btn btn-black" href="{{route('shop')}}">
                          <span><i class="fa fa-angle-left"></i></span>{{__('Continuer vos achats')}}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="cart-total-table address-box commun-table mb-30">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>{{__('Informations sur le client')}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                              <ul>
                                  @if($orders->first() instanceof \App\Modules\OrdersLogic\Models\Order)

                                      <li class="inner-heading"> <b>{{$orders->first()->clientRelation->last_name}}</b> <b>{{$orders->first()->clientRelation->first_name}}</b> </li>
                                      <li>
                                          <p>{{__('Numéro de téléphone')}}: {{'0'.$orders->first()->clientRelation->phone}}</p>
                                      </li>
                                      <li>
                                          <p>{{__('Wilaya')}}: {{$orders->first()->wilaya??$orders->first()->address->commune->wilaya->name}} - {{$orders->first()->commune??$orders->first()->address->commune->name}}</p>
                                      </li>
                                      <li>
                                          <p>{{__('Adresse')}}: {{$orders->first()->address->address}}</p>
                                      </li>

                                  @else


                                      <li class="inner-heading"> <b>{{$orders->first()->full_name}}</b> </li>
                                      <li>
                                          <p>{{__('Numéro de téléphone')}}: {{'0'.$orders->first()->phone}}</p>
                                      </li>
                                      <li>
                                          <p>{{__('Wilaya')}}: {{$orders->first()->wilaya}} - {{$orders->first()->commune}}</p>
                                      </li>
                                      <li>
                                          <p>{{__('Adresse')}}: {{$orders->first()->address}}</p>
                                      </li>

                                  @endif
                              </ul>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
