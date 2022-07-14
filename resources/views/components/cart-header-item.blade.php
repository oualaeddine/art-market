<div class="header__notification">
    <a href="#" class="header__preview"><img src="/website/images/demo/product-0-8.jpeg" alt="item"></a>
    <div class="header__details">
        <a href="#" class="header__subtitle">{{$item->name}}</a>
{{--        <div class="header__payment__method">6 months installment <span>+22%</span></div>--}}
        <div class="header__store">{{("From {$item->options->vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} } store")}}</div>
        <div class="header__date">13h ago</div>
    </div>
    <div class="header__price">{{(number_format($item->price,2).trans('DA'))}}</div>
    <div class="header__remove"><i class="fal fa-times"></i></div>
</div>
