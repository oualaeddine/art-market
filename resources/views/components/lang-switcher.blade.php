<div class="header__item header__item_user js-header-item js-demo-user mx-2">
    <button class="header__head js-header-head" style="width: 40px">
        <div class="header__avatar" style="width: 40px"> {{app()->getLocale()}} <i class="fas fa-angle-down"></i></div>
    </button>
    <div class="header__body js-header-body"style=" width: 110px; height: 70px; padding: 10px 25px; ">
        <div class="header__menu profile__menu" style=" margin-top: 0px; ">
            <span class="profile__menu__title">{{__("Languages")}}</span>
            <a class="header__link" href="{{route('client.account',['tab'=>'account'])}}">
                <div class="header__text d-flex justify-content-between align-items-center w-100">{{__('Arabic')}}</div>
            </a>
        </div>
    </div>
</div>
