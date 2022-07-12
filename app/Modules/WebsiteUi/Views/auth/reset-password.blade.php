@extends('website.layouts.master')

@section('content')


<section class="checkout-section ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-8 ">
              <form class="main-form full" method="POST" action="{{route('client.reset-password.action')}}">
                  @csrf
                  <input type="hidden" name="token" value="{{ $token }}">
                <div class="row">
                  <div class="col-12 mb-20">
                    <div class="heading-part heading-bg">
                      <h2 class="heading">{{__('Réinitialiser le mot de passe')}}</h2>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="login-email">{{__('Téléphone')}}</label>
                      <input name="phone" id="login-email" type="tel" required>
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                  </div>
                    <div class="col-12">
                    <div class="input-box">
                      <label for="login-email">{{__('Code')}}</label>
                      <input name="code" id="login-email" type="text" required>
                        @if ($errors->has('code'))
                            <span class="text-danger">{{ $errors->first('code') }}</span>
                        @endif
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="login-pass">{{__('Mot de passe')}}</label>
                      <input name="password" id="login-pass" type="password" required >
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="login-pass">{{__('Confirmation de mot de passe')}}</label>
                      <input name="password_confirmation" id="login-pass" type="password" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                  </div>
                  <div class="col-12">
                    <button name="submit" type="submit" class="btn-color right-side">{{__('Réinitialiser')}}</button>
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
