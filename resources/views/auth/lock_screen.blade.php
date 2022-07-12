@extends('layouts.app')

@section('content')

<section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Login card start -->
                <form class="md-float-material form-material">
                    <div class="text-center">
                        <img src="/assets/images/logo.png" alt="logo.png">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center"><i class="icofont icofont-lock text-primary f-80"></i></h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="text" name="email" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="form-label float-label">Votre adresse e-mail</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-grid">
                                        <button type="button" class="btn btn-primary btn-md waves-effect text-center m-b-20">
                                            <i class="icofont icofont-lock"></i> Écran de verrouillage 
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <p class="f-w-600 text-end">Retour à <a href="auth-sign-in-social.html">Se connecter.</a></p>
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="text-inverse text-start m-b-0">Merci.</p>
                                 {{--    <p class="text-inverse text-start"><a href="index.html"><b>Retour au site web</b></a></p> --}}
                                </div>
                                <div class="col-md-2">
                                    <img src="/assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Login card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>

@endsection