<header class="{{Illuminate\Support\Facades\Route::currentRouteName()=='index'?'art-market-pace-header':''}} header js-header homepage-header" data-id="#header">

    <div class="header__center center">

            <x-header-elements />

            <x-cart-header />

        @auth('client')
            <x-profile-dropdown />
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
