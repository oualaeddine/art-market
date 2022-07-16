<div class="header__item header__item_user js-header-item js-demo-user">
    <button class="header__head js-header-head">
        <div class="header__avatar"><img src="{{asset(auth()->guard('client')->user()->avatar)}}" alt="Avatar" /></div>
    </button>
    <div class="header__body js-header-body">
        <div class="d-flex profile__header__body">
            <div class="header__avatar"><img src="{{asset(auth()->guard('client')->user()->avatar)}}" alt="Avatar" /></div>
            <div class="profile_user_main_informations">
                <div class="header__name">{{auth()->guard('client')->user()->last_name.' '.auth()->guard('client')->user()->first_name}}</div>
            </div>
        </div>

        <div class="header__menu profile__menu">
            <span class="profile__menu__title">Dashboard</span>


            <a class="header__link" href="{{route('client.account',['tab'=>'account'])}}">
                <div class="header__icon yellow">
                    <i class="fad fa-user"></i>
                </div>
                <div class="header__text d-flex justify-content-between align-items-center w-100">{{__('Account')}}</div>
            </a>

            <a class="header__link" href="{{route('client.account',['tab'=>'orders'])}}">
                <div class="header__icon green">
                    <i class="fad fa-credit-card"></i>
                </div>
                <div class="header__text d-flex justify-content-between align-items-center w-100">{{__("Orders")}} <span class="blue">{{auth()->guard('client')->user()->orders_count}}</span></div>
            </a>
        </div>

        <div class="header__menu profile__menu">
            <span class="profile__menu__title">My account</span>
            <a class="header__link__with__underline" href="{{route('client.account',['tab'=>'account'])}}">
                {{__("Update my profile")}}
            </a>
            <a class="header__link__with__underline logout" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();">
                {{__("Log Out")}}
            </a>
            <form action="{{route('client.logout.action')}}" method="POST" id="logout-form">
                @csrf
            </form>
        </div>
    </div>
</div>
