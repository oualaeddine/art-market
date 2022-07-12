@extends('website.layouts.master')

@section('content')

<section class="checkout-section ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-8 ">
                <div class="row">
                  <div class="col-12 mb-20">
                    <div class="heading-part heading-bg text-center">
                      <h2 class="heading">{{__("Suivre votre commande")}}</h2>
                    </div>
                  </div>
                  <div class="col-12">
                      <label for="login-email">{{__("Numéro de commande : ")}} {{$orders->first()->tracking_code??$raw_orders->first()->tracking_code}}</label>

                  @foreach($orders as $order)
                          <div class="input-box card p-2">
                                <label for="login-email">{{__("Vendeur : ")}} {{\Illuminate\Support\Facades\Session::get('client_lang')?($order->vendor->name_ar??$order->vendor->name_fr):$order->vendor->name_fr}}</label>
                            @switch($order->status)
                                @case('pending')
                                <label class="text-warning" >{{__('La commande en phase de traitement')}}</label>
                                @break

                                @case('canceled')
                                <label class="text-danger" >{{__('La commande a été annulée')}}</label>
                                @break

                                @case('confirmed')
                                <label class="text-primary" >{{__('La commande a été confirmée')}}</label>
                                @break

                                @case('complete')
                                <label class="text-green" >{{__('La commande est terminée')}}</label>
                                @break
                            @endswitch
                          </div>

                        @endforeach
                        @foreach($raw_orders as $order)
                              <div class="input-box card p-2">
                                    <label for="login-email">{{__("Vendeur : ")}} {{$order->vendor->name_fr}}</label>
                                  <label class="text-primary" >{{__('La commande en phase de traitement')}}</label>
                              </div>
                        @endforeach
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
