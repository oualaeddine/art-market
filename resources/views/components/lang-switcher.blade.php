<div class="header__item header__item_user js-header-item js-demo-user mx-2">
    <button class="header__head js-header-head" style="width: 40px">
        <div class="header__avatar" style="width: 40px;height: 18px;"> <span>{{ucfirst(app()->getLocale()=='fr'?'Fr':'Ar')}}</span> <i class="fas fa-angle-down"></i></div>
    </button>
    <div class="header__body js-header-body"style="margin-top: -30px; width: 110px; padding: 10px 25px; ">
        <div class="header__menu profile__menu" style=" margin-top: 0px; ">
            <span class="profile__menu__title">{{__("Language")}}</span>

                <div class="header__text d-flex justify-content-between align-items-center w-100"><a  href="{{route('SetLang',['locale'=>'ar'])}}">{{__('Arabe')}}</a></div>
                <div class="header__text d-flex justify-content-between align-items-center w-100"><a  href="{{route('SetLang',['locale'=>'fr'])}}">{{__('Français')}}</a></div>
        </div>
    </div>
</div>
