<div class="header__notification">
    <a href="#" class="header__preview"><img src="/website/images/demo/product-0-8.jpeg" alt="item"></a>
    <div class="header__details">
        <a href="#" class="header__subtitle">{{$item->name}}</a>
{{--        <div class="header__payment__method">6 months installment <span>+22%</span></div>--}}
        <div class="header__store">{{("From {$item->{app()->getLocale()=='fr'?'name':'options->name_ar'} } store")}}</div>
        <div class="header__date">x &nbsp;{{$item->qty}}</div>
        <div class="header__date">{{\Illuminate\Support\Carbon::parse($item->options->created_at)}}</div>
    </div>
    <div class="header__price">{{(number_format($item->price*$item->qty,2).trans('DA'))}}</div>
    <div class="header__remove cart-remove-item" onclick="DeleteCartItem({{$item->id}})" ><i class="fal fa-times"></i></div>
</div>
