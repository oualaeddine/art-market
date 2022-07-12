@extends('website.layouts.master')

@section('content')


<section class="checkout-section ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-8 ">
              <form class="main-form full" action="{{route('client.track_order')}}" method="post">
                  @csrf
                <div class="row">
                  <div class="col-12 mb-20">
                    <div class="heading-part heading-bg text-center">
                      <h2 class="heading">{{__("Suivre votre commande")}}</h2>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="login-email">{{__("Numéro de commande")}}</label>
                      <input name="tracking_code" id="login-email" type="text" required >
                    </div>
                  </div>
                  <div class="col-12 text-center">
              {{--       <div class="check-box left-side">
                      <span>
                        <input type="checkbox" name="remember_me" id="remember_me" class="checkbox">
                        <label for="remember_me">Remember Me</label>
                      </span>
                    </div> --}}
                    <button type="submit" class="btn-color">{{__("Chercher")}}</button>
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
