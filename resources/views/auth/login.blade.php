@extends('layouts.app')

@section('content')

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    @include('partials.error.error')
                    <!-- Authentication card start -->
                    <form class="md-float-material form-material" action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="text-center">
                            <img src="/dash_logo.png" alt="logo" width="200" >
                            {{-- <h2><b>Acticom</b> </h2> --}}
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary"><b>Connexion</b></h3>
                                    </div>
                                </div>

                                <p class="text-muted text-center p-b-5">Connectez-vous pour commencer votre session</p>
                                <div class="form-group form-primary">
                                    <input type="text" name="email" value="{{old('email')}}" class="form-control {{old('email')?'fill':''}}" required="">
                                    <span class="form-bar"></span>
                                    <label class="form-label  float-label">Email</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="form-label float-label">Mot de passe</label>
                                </div>

                                @if (Session::get('second_try'))

                                    <div class="form-group mt-4 mb-4 captcha-div">
                                        <div class="captcha">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload-captcha">
                                                ↻
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group form-primary captcha-div">

                                        <input id="captcha" type="text" class="form-control" required name="captcha">
                                        <span class="form-bar"></span>
                                        <label class="form-label float-label">Captcha</label>
                                    </div>

                                @endif



                                <div class="row m-t-25 text-start">
                                    <div class="col-12">
                                        {{--   <div class="checkbox-fade fade-in-primary">
                                              <label class="form-label">
                                                  <input type="checkbox" value="">
                                                  <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                  <span class="text-inverse">Remember me</span>
                                              </label>
                                          </div> --}}
{{--                                        <div class="forgot-phone text-end float-end">--}}
{{--                                            <a href="{{route('admin.forgot_password')}}" class="text-end f-w-600"> J'ai oublié mon mot de passe</a>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary btn-md waves-effect text-center m-b-20">Connexion</button>
                                        </div>
                                    </div>
                                </div>
                                {{-- <p class="text-inverse text-start">Don't have an account?<a href="auth-sign-up-social.html"> <b>Register here </b></a>for free!</p> --}}
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>


    @push('js')

        <script src="/assets/js/captcha.js"></script>

    @endpush


@endsection
