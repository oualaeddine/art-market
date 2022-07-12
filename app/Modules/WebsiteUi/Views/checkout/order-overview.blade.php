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
                    <li class="active">  <a href="{{route('checkout.overview',$orders->first()->tracking_code)}}">
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
                    <li><a href="{{route('checkout.complete',$orders->first()->tracking_code)}}">
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
                  <h2 class="heading">{{__('Aperçu de la commande')}}</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 mb-sm-30">
                <div class="cart-item-table commun-table mb-30">
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
                <div class="cart-total-table commun-table mb-30">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">{{__('Total du panier')}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>{{__('Article(s) Sous-total')}}</td>
                          <td><div class="price-box"> <span class="price">{{number_format($orders->sum('total'), 2, '.', ',')}} {{__("DA")}}</span> </div></td>
                        </tr>
                     {{--    <tr>
                          <td>Expédition</td>
                          <td><div class="price-box"> <span class="price">$0.00</span> </div></td>
                        </tr> --}}
                        <tr>
                          <td><b>{{__('Montant à payer')}}</b></td>
                          <td><div class="price-box"> <span class="price"><b> {{number_format($orders->sum('total'), 2, '.', ',')}} {{__("DA")}}</b></span> </div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="right-side float-none-xs">
                      <form action="{{route('checkout.confirm',$orders->first()->tracking_code)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-color">{{__('Suivant')}}</button>
                      </form>
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
             {{--    <div class="cart-total-table address-box commun-table">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Billing Address</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <ul>
                              <li class="inner-heading"> <b>Denial tom</b> </li>
                              <li>
                                <p>5-A kadStylexpoi aprtment,opp. vasan eye care,</p>
                              </li>
                              <li>
                                <p>Risalabaar,City Road, deesa-405001.</p>
                              </li>
                              <li>
                                <p>India</p>
                              </li>
                            </ul>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
