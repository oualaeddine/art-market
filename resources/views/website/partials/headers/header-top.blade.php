<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="top-link top-link-left {{-- select-dropdown --}}">
                   {{--  <fieldset> --}}
                       @php
                           $lang = Session::get('client_lang') ?? 'fr';
                       @endphp
                        <select name="speed" class="countr {{-- option-drop --}} change-lang">
                            <option  value="fr"@if($lang == 'fr') selected="selected" @endif>Français</option>
                            <option value="ar" @if($lang == 'ar') selected="selected" @endif>العربية</option>
                        </select>
                        {{--      <select name="speed" class="currenc option-drop">
                               <option selected="selected">USD</option>
                               <option>EURO</option>
                               <option>POUND</option>
                             </select> --}}
                    {{-- </fieldset> --}}

                </div>
            </div>
            <div class="col-3">
                <div class="mt-2">
                    <a class="mt-2" href="tel:{{$settings->where('name','contact tél 1')->first()->value??'#'}}">{{__("Besoin d'aide?")}} {{$settings->where('name','contact tél 1')->first()->value??'#'}}</a>
                </div>
            </div>
            <div class="col-4">
                <div class="top-right-link right-side">
                    <ul>
                        <li class="login-icon content">
                            <a class="content-link">
                                <span class="content-icon"></span>
                            </a>
                            @guest('client')
                                <a href="{{route('client.login')}}" title="Se connecter">{{__('Se connecter')}}</a> {{__('ou')}}
                                <a href="{{route('client.register')}}" title="S'inscrire">{{__("S'inscrire")}}</a>
                            @endguest
                            @auth('client')
                                <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();" title="Logout">
                                    {{__("Déconnecter")}}</a>

                                 <i class="fa fa-user ml-2"></i><a href="{{route('client.account')}}" title="Compt">
                                    {{__("Compte")}}</a>
                            @endauth

                            <div class="content-dropdown">
                                <ul>
                                    @guest('client')
                                        <li class="login-icon"><a href="{{route('client.login')}}" title="Se connecter"><i
                                                    class="fa fa-user ml-2"></i> {{__('Se connecter')}}</a></li>

                                        <li class="register-icon ml-2"><a href="{{route('client.register')}}"
                                                                     title="S'inscrire"><i class="fa fa-user-plus "></i>
                                                                     {{__("S'inscrire")}}</a></li>
                                    @endguest

                                    @auth('client')
                                        <li class="register-icon">
                                            <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();" title="Déconnecter"><i class="fa fa-share-square-o ml-1 mr-1"></i>{{__('Déconnecter')}}</a>
                                        </li>
                                            <li class="register-icon">
                                                <i class="fa fa-user ml-1 mr-1"></i><a href="{{route('client.account')}}" title="Compt">
                                                    {{__("Compte")}}</a>
                                            </li>
                                    @endauth
                                        <form action="{{route('client.logout.action')}}" method="POST" id="logout-form">
                                            @csrf
                                        </form>
                                </ul>
                            </div>
                        </li>
                        <li class="track-icon">
                            <a href="{{route('order-tracking')}}" title="Suivez votre commande"><span></span>{{__('Suivez')}}</a>
                        </li>
{{--                        <li class="gift-icon">--}}
{{--                            <a href="{{route('blog')}}" title="Comment utiliser le coupon"><span></span>{{__('Coupon')}}</a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
