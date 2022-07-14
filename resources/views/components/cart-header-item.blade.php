<div class="header__notification">
    <a href="{{route('product',[$item->options->slug])}}" class="header__preview"><img src="{{asset($item->options->image??"/website/images/demo/product-0-8.jpeg")}}" alt="item"></a>
    <div class="header__details">
        <a href="{{route('product',[$item->options->slug])}}" class="header__subtitle">{{$item->{app()->getLocale()=='fr'?'name':'->options->name_ar'} }}</a>
{{--        <div class="header__payment__method">6 months installment <span>+22%</span></div>--}}
        <div class="header__store">{{__("From")}} <a href="#">{{$item->options->{app()->getLocale()=='fr'?'vendor_name_fr':'vendor_name_ar'} }}</a> {{__("store")}}</div>
        <div class="header__date">x &nbsp;{{$item->qty}}</div>
        <div class="header__date">{{$item->options->created_at}}</div>
    </div>
    <div class="header__price">{{(number_format($item->price*$item->qty,2).trans('DA'))}}</div>
    <div class="header__remove cart-remove-item" data-id="{{$item->id}}" onclick="DeleteCartItem({{$item->id}})" ><i class="fal fa-times"></i></div>
</div>
