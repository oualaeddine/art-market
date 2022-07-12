@extends('website.layouts.master')


@section('content')

    <section class="checkout-section ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout-step mb-40">
                        <ul>
                            <li class="active">
                                <a href="{{route('checkout')}}">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">1</div>
                                    </div>
                                    <span>{{__('Expédition')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">2</div>
                                    </div>
                                    <span>{{__('Aperçu de la commande')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">3</div>
                                    </div>
                                    <span>{{__('Commande terminée')}}</span>
                                </a>
                            </li>
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
                                    @if ($client)
                                        <h2 class="heading">{{__('Veuillez vérifier vos informations')}}</h2>
                                    @else
                                        <h2 class="heading">{{__('Veuillez remplir vos informations')}}</h2>
                                    @endif

                                </div>
                            </div>
                        </div>
                        @auth('client')
                          @include('WebsiteUi::modals.create-address')
                        @endauth
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-8 col-md-8">
                                <form action="{{route('store_info')}}" class="main-form full" method="POST">
                                    @csrf

                                    @auth('client')
                                        @include('partials.billing-auth')
                                    @endauth

                                    @guest('client')
                                        @include('partials.billing-no-auth')
                                    @endguest

                                    <div class="col-md-12">
                                       @auth('client')
                                        <a href="javascript:void(0)"
                                           data-toggle="modal" data-target="#modals-create-client-address"
                                                class="btn btn-black left-side">{{__('Ajouter une address')}}</a>
                                        @endauth
                                        <button type="submit"
                                                class="btn btn-color right-side btn-phone-send">{{__('Suivant')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')

        <script>

            $('body').on('click', '.btn-address', function () {

                var prev_ch = $(this).prev();

                prev_ch.find('.select-address').remove()

                $('.prototype').find('.input-address').clone().appendTo(prev_ch.find('.input-box'))

                $(this).addClass('btn-address-reverse')

                $(this).removeClass('btn-address')

                $(this).text('Retour')

            })

            $('body').on('click', '.btn-address-reverse', function () {

                var prev_ch = $(this).prev();

                prev_ch.find('.input-address').remove()

                $('.prototype').find('.select-address').clone().appendTo(prev_ch.find('.input-box'))

                $(this).removeClass('btn-address-reverse')

                $(this).addClass('btn-address')

                $(this).text('Nouveau')

            })


        </script>

    @endpush

@endsection
