@extends('website.layouts.master')

@section('content')



    <section class="checkout-section ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-8 ">
                            <form class="main-form full" action="{{route('client.login.action')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-20">
                                        <div class="heading-part heading-bg text-center">
                                            <h2 class="heading">{{__('Se connecter')}}</h2>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-box">
                                            <label for="phone">{{__('Numéro de téléphone')}}</label>
                                            <input id="phone" value="{{old('phone')}}" type="tel" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-box">
                                            <label for="login-pass">{{__('Mot de passe')}}</label>
                                            <input id="login-pass" type="password" required name="password"
                                                   >
                                        </div>
                                    </div>
                                    <div class="col-12">
                                       {{--  <div class="check-box left-side">
                                      <span>
                                        <input type="checkbox" name="remember_me" id="remember_me"  class="checkbox">
                                        <label for="remember_me">Se souvenir de moi</label>
                                      </span>
                                        </div> --}}
                                        <button name="submit" type="submit" class="btn-color right-side">{{__('Se connecter')}}</button>
                                    </div>
                                    <div class="col-12"><a title="Forgot Password" class="forgot-password mtb-20"
                                                           href="{{route('client.forget-password')}}">{{__('Mot de passe oublié ?')}}</a>
                                        <hr>
                                    </div>
                                    <div class="col-12">
                                        <div class="new-account align-center mt-20"> <span>{{__('Vous êtes nouveau')}} ?</span> <a class="link" title="Register with Stylexpo" href="{{route('client.register')}}">
                                            {{__("Créer un nouveau compte")}}</a> </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
