
    <a class="header__logo" href="{{route('index')}}">
        <img class="some-icon" src="/website/images/logo-dark.png" alt="logo"/>
        <img class="some-icon-dark" src="/website/images/logo-light.png" alt="logo"/>
    </a>
    <div class="header__wrapper js-header-wrapper">
        <nav class="header__nav ">
            <li class="nav-item"><a class="header__link" href="{{route('index')}}">{{__("Homepage")}}</a></li>
            <li class="nav-item js-header-item has-megamenu">
                <a class="header__link js-header-head" href="#" data-bs-toggle="dropdown" href="search01.html">{{__("Collections")}}</a>
                <div class="megamenu__container header__body js-header-body" style="z-index: 3;">
                    <div class="row justify-content-start">
                        <div class="col-md-12">
                            <div class="mega__menu_title">
                                <div class="title">Browser products by most popular</div>
                                <h3 class="sub__title">Brands</h3>
                            </div>
                            <div class="row justify-content-start">
                                <div class="col-md-3 mega__menu__links__group">
                                    <a href="#">Moisturizer</a>
                                    <a href="#">Night Cream</a>
                                    <a href="#">Face Oil</a>
                                    <a href="#">Mist & Essences</a>
                                    <a href="#">False Eyelashes</a>
                                </div>

                                <div class="col-md-3 mega__menu__links__group">
                                    <a href="#">Moisturizer</a>
                                    <a href="#">Night Cream</a>
                                    <a href="#">Face Oil</a>
                                </div>


                                <div class="col-md-3 mega__menu__links__group">
                                    <a href="#">Moisturizer</a>
                                    <a href="#">Night Cream</a>
                                    <a href="#">Face Oil</a>
                                    <a href="#">Mist & Essences</a>
                                </div>

                                <div class="col-md-3 mega__menu__links__group">
                                    <a href="#">Moisturizer</a>
                                    <a href="#">Night Cream</a>
                                    <a href="#">Face Oil</a>
                                    <a href="#">Mist & Essences</a>
                                    <a href="#">False Eyelashes</a>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </li>
            {{--                <li class="nav-item"><a class="header__link" href="item.html">Shop</a></li>--}}
            <li class="nav-item"><a class="header__link" href="{{route('vendors')}}">{{__("Vendors")}}</a></li>
            <li class="nav-item"><a class="header__link" href="{{route('shop')}}">{{__("Shop")}}</a></li>
            <li class="nav-item"><a class="header__link" href="profile.html">{{__("Contact us")}}</a></li>
        </nav>
        <form class="header__search">
            <input class="header__input" type="text" name="search" placeholder="{{__("Search")}}" required=""/>
            <button class="header__result">
                <span class="icon icon-search"></span>
            </button>
        </form>
    </div>

