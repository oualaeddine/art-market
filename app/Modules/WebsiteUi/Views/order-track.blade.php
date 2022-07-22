@extends('website.app')

@section('content')
    <div class="outer__inner">
        <div class="package__tracking__container pt-15 pb-25">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="variants__top text-center">
                        <h1 class="variants__title h2">{{__("Track your shipment")}}</h1>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8 d-lg-flex justify-content-center">
                        {{--    <a class="package__tracking__chose" href="#"><i class="fal fa-plus"></i> Choose one of your
                               orders</a> --}}
                        <form class="package__tracking__form">
                            <div class="input-group">
                                <input required type="text" name="tracking"
                                       placeholder="{{__("ENTRE YOUR TRACKING ID")}}" value="{{$track_id}}"/>
                                <button type="submit" class="package__tracking__button"><i
                                        class="fal fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                @if ($orders->isNotEmpty() || $raw_orders->isNotEmpty())
                    @foreach($orders as $order)
                        <div class="package__tracking__result">
                            <div class="row justify-content-center mt-15">
                                <div class="col-md-8">
                                    <div class="package__tracking__box">
                                    <span class="package__tracking__now">{{trans($order->status)}}
                                        <small>{{$order->tracking_code}}</small></span>
                                        <div class="package__tracking__box__main__informations">
                                            <i class="fad fa-box-alt"></i>
                                            <h3>{{__("Products")}}</h3>
                                            <div class="row">

                                                @foreach ($order->products as $p)

                                                    <div class="package__tracking__box__main__text col-md-12 mb-4">

                                                        <h5 class="">{{$p->product->name_fr}} * {{$p->quantity}}</h5>
                                                        <small
                                                            class="dis"><b>{{number_format($p->price,2)}}</b> {{__('DA')}}
                                                        </small>
                                                        {{-- <small class="dis"><b>from</b> Setif - Algeria</small> --}}
                                                        {{-- <small class="dis mt-n1"><b>Delevry</b> Medea - Algeria</small> --}}
                                                    </div>

                                                @endforeach

                                            </div>


                                        </div>
                                        <div class="package__tracking__box__estimate">
                                            {{-- <span class="eta">ETA</span> --}}
                                            <span class="date">{{\Carbon\Carbon::parse($order->updated_at)->format('d')}} <small>{{\Carbon\Carbon::parse($order->updated_at)->format('M')}}</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                    @foreach($raw_orders as $order)
                        <div class="package__tracking__result">
                            <div class="row justify-content-center mt-15">
                                <div class="col-md-8">
                                    <div class="package__tracking__box">
                                    <span class="package__tracking__now">{{trans($order->status)}}
                                        <small>{{$order->tracking_code}}</small></span>
                                        <div class="package__tracking__box__main__informations">
                                            <i class="fad fa-box-alt"></i>
                                            <h3>{{__("Products")}}</h3>

                                            <div class="row">

                                                @foreach ($order->products as $p)

                                                    <div class="package__tracking__box__main__text col-md-12 mb-4">
                                                        <h5 class="">{{$p->product->name_fr}} * {{$p->quantity}}</h5>
                                                        <small
                                                            class="dis"><b>{{number_format($p->price,2)}}</b> {{__('DA')}}
                                                        </small>
                                                        {{-- <small class="dis"><b>from</b> Setif - Algeria</small> --}}
                                                        {{-- <small class="dis mt-n1"><b>Delevry</b> Medea - Algeria</small> --}}
                                                    </div>

                                                @endforeach

                                            </div>


                                        </div>
                                        <div class="package__tracking__box__estimate">
                                            {{-- <span class="eta">ETA</span> --}}
                                            <span class="date">{{\Carbon\Carbon::parse($order->updated_at)->format('d')}} <small>{{\Carbon\Carbon::parse($order->updated_at)->format('M')}}</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                @else

                    <div class="package__tracking__result">
                        <div class="row justify-content-center mt-15">
                            <x-no-data/>
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </div>
@endsection
