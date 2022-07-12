<div class="footer">
    <div class="container">
      <div class="footer-inner">
        <div class="footer-middle">
          <div class="row">
            <div class="col-lg-4 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <div class="f-logo">
                  <a href="{{route('index')}}" class="">
                    <img alt="Stylexpo" src="/logo-viannet.png" class="logo-home">
                  </a>
                </div>
                <div class="footer-block-contant">
                    @if(\Illuminate\Support\Facades\Session::get('client_lang'))
                        <p>{{$settings->where('name','description_ar')->first()->value??'#'}}</p>
                    @else
                        <p>{{$settings->where('name','description_fr')->first()->value??'#'}}</p>

                    @endif
                </div>
              </div>
            </div>
            <div class="col-lg-4 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">{{__('Liens rapides')}}<span></span></h3>
                <ul class="footer-block-contant link">
                  <li><a href="{{route('shop')}}">{{__('Boutique')}}</a></li>
                    <li><a href="{{route('contact')}}">{{__('Nous contacter')}}</a></li>
                    <li><a href="{{route('terms_conditions')}}">{{__('Termes et conditions')}}</a></li>
                    <li><a href="{{route('faq')}}"> {{__('FAQs')}}</a></li>
                    <li><a href="{{route('about')}}">
                        {{__("A propos de nous")}}</a>

                 {{--  <li><a href="#"> Sitemap</a></li> --}}
                </ul>
              </div>
            </div>
            <div class="col-lg-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">{{__('Informations générales')}}<span></span></h3>
                <ul class="footer-block-contant address-footer">
                  <li class="item"> <i class="fa fa-map-marker"> </i>
                      <p> <a target="_blank" href="{{$settings->where('name','adresse_fr')->first()->value??'#'}}">{{__("Rte de Sebala, Draria")}}</a></p>
                  </li>
                  <li class="item"> <i class="fa fa-envelope"> </i>
                    <p> <a href="mailto:{{$settings->where('name','email')->first()->value??'#'}} ">{{$settings->where('name','email')->first()->value??'#'}} </a> </p>
                  </li>
                  <li class="item"> <i class="fa fa-phone"> </i>
                      <p> <a href="tel:{{$settings->where('name','contact tél 1')->first()->value??'#'}} ">{{$settings->where('name','contact tél 1')->first()->value??'#'}} </a> </p>
                  </li>
{{--                    <li class="item"> <i class="fa fa-phone"> </i>--}}
{{--                      <p> <a href="tel:{{$settings->where('name','contact tél 2')->first()->value??'#'}} ">{{$settings->where('name','contact tél 2')->first()->value??'#'}} </a> </p>--}}
{{--                  </li>--}}
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="footer-bottom ">
          <div class="row mtb-30">
            <div class="col-lg-6 ">
              <div class="copy-right "> Made with ♥ by <a href="https://coodiv.net/" target="_blank">COODIV</a> &nbsp;. &nbsp;All rights reserved</div>
            </div>
            <div class="col-lg-6 ">
              <div class="footer_social pt-xs-15 center-sm">
                <ul class="social-icon">
                  <li><div class="title">{{__('Suivez-nous sur')}}:</div></li>
                  <li><a target="_blank" href="{{$settings->where('name','facebook')->first()->value??'#'}}" title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                  <li><a target="_blank" href="{{$settings->where('name','instagram')->first()->value??'#'}}" title="Instagram" class="instagram"><i class="fa fa-instagram"> </i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <hr>
{{--          <div class="row align-center mtb-30 ">--}}
{{--            <div class="col-12 ">--}}
{{--              <div class="site-link">--}}
{{--                <ul>--}}
{{--                  <li><a href="{{route('about')}}">{{__('À propos de nous')}}</a></li>--}}
{{--                  <li><a href="{{route('contact')}}">{{__('Nous contacter')}}</a></li>--}}
{{--                  <li><a href="{{route('client.register')}}">{{__('Client')}}</a></li>--}}
{{--                  <li><a href="#">{{__('Confidentialité')}}</a></li>--}}
{{--                  <li><a href="{{route('terms_conditions')}}">{{__('Termes et conditions')}}</a></li>--}}
{{--                </ul>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
  {{--         <div class="row align-center">
            <div class="col-12 ">
              <div class="payment">
                <div class="payment_icon">
                  <a href="javascript:void(0)"><img src="/website/assets/images/payment-footer.png" alt="Stylexpo"></a>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
