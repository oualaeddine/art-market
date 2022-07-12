@extends('layouts.master')

@section('content')

    <div class="row">

        {{--  $contact_Cp  --}}
        {{--  $contactTraite_Cp  --}}
        {{--  $result  --}}
        <div class="col-xl-4 col-md-6">
            <div class="card analytic-card card-blue">
                <div class="card-body">
                    <div class="row align-items-center m-b-30">
                        <div class="col-auto">
                            <i class="fas fa-users text-c-blue f-18 analytic-icon"></i>
                        </div>
                        <div class="col text-end">
                            <h3 class="m-b-5 text-white">{{$client_Cp}}</h3>
                            <h6 class="m-b-0 text-white">Clients</h6>
                        </div>
                    </div>
{{--                    <p class="m-b-0 text-white d-inline-block">moyen par client : </p>--}}

{{--                    <h5 class="text-white d-inline-block m-b-0 m-l-10" style="font-size: 15px;"> {{number_format($avg_spending, 2, ".", ",").' DA'}}</h5>--}}
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-md-12">
            <div class="card analytic-card card-green">
                <div class="card-body">
                    <div class="row align-items-center m-b-30">
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart text-c-green f-18 analytic-icon"></i>
                        </div>
                        <div class="col text-end">
                            <h3 class="m-b-5 text-white">{{$orders_Cp}}
                            </h3>
                            <h6 class="m-b-0 text-white">Commandes</h6>
                        </div>
                    </div>
{{--                    <p class="m-b-0  text-white d-inline-block">Total : </p>--}}

{{--                    <h5 class=" text-white d-inline-block m-b-0 m-l-10" style="font-size: 15px;">{{number_format($product_total_sum, 2, ".", ",").' DA'}}</h5>--}}
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card analytic-card card-inverse">
                <div class="card-body">
                    <div class="row align-items-center m-b-30">
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart  f-18 analytic-icon"></i>
                        </div>
                        <div class="col text-end">
                            <h3 class="m-b-5 text-white">{{$orderConfirmed_Cp}}
                                @if($result =='Négative')
                                    <i class="fas fa-caret-down m-r-10 f-18"></i>

                                @elseif($result=='Positive')
                                    <i class="fas fa-caret-up m-r-10 f-18"></i>
                                @else
                                    <i class="fas fa-minus m-r-10 f-18"></i>
                                @endif
                            </h3>
                            <h6 class="m-b-0 text-white">Commandes Complète</h6>
                        </div>
                    </div>
{{--                    <p class="m-b-0  text-white d-inline-block">Total : </p>--}}

{{--                    <h5 class=" text-white d-inline-block m-b-0 m-l-10" style="font-size: 15px;">{{number_format($product_total_confirmed_sum, 2, ".", ",").' DA'}}</h5>--}}
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-md-6">
            <div class="card analytic-card card-red">
                <div class="card-body">
                    <div class="row align-items-center m-b-30">
                        <div class="col-auto">
                            <i class="fas fa-list-ul text-c-red f-18 analytic-icon"></i>
                        </div>
                        <div class="col text-end">
                            <h3 class="m-b-5 text-white">{{$product_Cp}}</h3>
                            <h6 class="m-b-0 text-white">Total Produits</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card analytic-card card-warning">
                <div class="card-body">
                    <div class="row align-items-center m-b-30">
                        <div class="col-auto">
                            <i class="fas fa-question text-c-red f-18 analytic-icon"></i>
                        </div>
                        <div class="col text-end">
                            <h3 class="m-b-5 text-white">{{$contact_Cp}}</h3>
                            <h6 class="m-b-0 text-white">Contacts en attent</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
