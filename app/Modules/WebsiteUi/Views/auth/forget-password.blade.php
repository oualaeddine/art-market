@extends('website.layouts.master')

@section('content')


    <section class="checkout-section ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-8 ">
{{--                            <form class="main-form full" method="POST" action="{{route('client.forget-password.action')}}">--}}
{{--                                @csrf--}}
                                <div class="row">
                                    <div class="col-12 mb-20">
                                        <div class="heading-part heading-bg text-center">
                                            <h2 class="heading">{{__('En attene de service SMS')}}</h2>
{{--                                            <h2 class="heading">{{__('Mot de passe oublié')}}</h2>--}}
                                        </div>
                                    </div>
{{--                                    <div class="col-12">--}}
{{--                                        <div class="input-box">--}}
{{--                                            <label for="Phone">{{__('Téléphone')}}</label>--}}
{{--                                            <input name="phone" id="Phone" type="tel" required readonly--}}
{{--                                                   placeholder="{{__('Téléphone')}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 d-flex justify-content-center">--}}
{{--                                        --}}{{--       <div class="check-box left-side">--}}
{{--                                                <span>--}}
{{--                                                  <input type="checkbox" name="remember_me" id="remember_me" class="checkbox">--}}
{{--                                                  <label for="remember_me">Remember Me</label>--}}
{{--                                                </span>--}}
{{--                                              </div> --}}
{{--                                        <button name="submit" type="submit" class="btn-color right-side">{{__('Envoyer un lien de réinitialisation')}}--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12">--}}
{{--                                        <div class="new-account align-center mt-20"><span>{{__('Vous êtes nouveau')}} ?</span> <a--}}
{{--                                                class="link" title="Register with Stylexpo"--}}
{{--                                                href="{{route('client.register')}}">{{__('Créer un nouveau compte')}}</a></div>--}}
{{--                                    </div>--}}
                                </div>
{{--                            </form>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
