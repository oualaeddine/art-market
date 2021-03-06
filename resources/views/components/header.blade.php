
<header
    class="{{Illuminate\Support\Facades\Route::currentRouteName()=='index'?'art-market-pace-header':''}} header js-header homepage-header d-print-none"
    data-id="#header">
    <div class="container text-center" style="background-color: transparent">
        {{__("Need help ?")}} <a href="tel:{{ $phone->value ?? '#' }}">{{ $phone->value ?? '#' }}</a>
    </div>
    <div class="header__center center">


        <x-header-elements/>
        <x-lang-switcher/>
        <x-cart-header/>
        @auth('client')
            <x-profile-dropdown/>
        @endauth

        @guest('client')
            <a class="header__account__btn" href="{{route('client.login')}}">{{__("Login")}}</a>
            <a class="header__account__btn ml-2" href="{{route('client.register')}}">{{__("Register")}}</a>
        @endguest


        <button class="header__burger js-header-burger"></button>
    </div>

    @if(\Illuminate\Support\Facades\Route::currentRouteName()=='index')
        <x-hero-section/>
    @endif

</header>
