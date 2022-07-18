
    <a class="header__logo" href="{{route('index')}}">
        <img class="some-icon" src="/ArtMarket.png" alt="logo"/>
        <img class="some-icon-dark" src="/website/images/logo-light.png" alt="logo"/>
    </a>
    <div class="header__wrapper js-header-wrapper">
        <nav class="header__nav ">
            <li class="nav-item"><a class="header__link {{\Illuminate\Support\Facades\Route::currentRouteName()=='index'?'active':''}}" href="{{route('index')}}">{{__("Homepage")}}</a></li>
            <li class="nav-item"><a class="header__link {{\Illuminate\Support\Facades\Route::currentRouteName()=='vendors'?'active':''}}" href="{{route('vendors')}}">{{__("Vendors")}}</a></li>
            <li class="nav-item"><a class="header__link {{\Illuminate\Support\Facades\Route::currentRouteName()=='shop'?'active':''}}" href="{{route('shop')}}">{{__("Shop")}}</a></li>
            <li class="nav-item"><a class="header__link {{\Illuminate\Support\Facades\Route::currentRouteName()=='contact'?'active':''}}" href="{{route('contact')}}">{{__("Contact us")}}</a></li>
        </nav>
        <form class="header__search">
            <input class="header__input" type="text" name="search" placeholder="{{__("Search")}}" required=""/>
            <button class="header__result">
                <span class="icon icon-search"></span>
            </button>
        </form>
    </div>

