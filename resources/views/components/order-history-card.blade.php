<style>
    .order__items {
        position: relative;
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 20px;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        transition: background .2s;
        border: 1px solid #f0f3f4;
    }
</style>
<div class="col-md-9">
    <div class="page__header d-flex justify-content-between align-items-center">
        <h5 class="user__page__titles">{{__("Your orders")}}</h5>
    </div>
    @foreach($client->orders as $order)

    <div>
        @php
           $color= [
                'pending'=>'default',
                'canceled'=>'danger',
                'success'=>'success',
                'confirmed'=>'success',
                'complete'=>'success',

            ][$order->status]
        @endphp
        <span class="badge badge-pill {{"badge-$color"}}" style="font-size: small;">{{ucfirst($order->status)}}</span>
        <span class="badge badge-pill badge-default" style="font-size: small;">{{$order->tracking_code}}</span>
        <span class="badge badge-pill badge-default" style="font-size: small;">{{$order->created_at}}</span>
        <span class="badge badge-pill badge-default" style="font-size: small;">{{number_format($order->total,2).trans('DA')}}</span>
        <a class="cart__remove text-right float-right" href="#"><i class="fal fa-times"></i> {{__("Cancel order")}}</a>
    </div>

    <div class="order__items {{"border-$color"}}">
            @foreach($order->products as $item)
            <div class="row justify-content-start w-100 align-items-center">
                <a href="{{route('product',[$item->instance->slug])}}"
                   class="cart__preview col-md-1"><img
                        src="{{asset($item->instance->image??'/website/images/demo/product-0-8.jpeg')}}" alt="item"/></a>

                <div class="col-md-4">
                    <div
                        class="cart__subtitle">{{$item->instance->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</div>
                    <div class="cart__description">{{__("From")}} <a
                            href="#">{{$order->vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</a> {{__("store")}}
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="cart__prices">
                        <div class="the__price__discount"
                             style="text-decoration: none">{{number_format($item->price,2).trans('DA')}}</div>
                        {{--                <div class="the__price">$89.00</div>--}}
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="cart__prices">
                        <div class="the__price">{{$item->quantity}}</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="cart__prices">
                        <div
                            class="the__price">{{number_format($item->price*$item->quantity,2).trans('DA')}}</div>
                    </div>
                </div>
            </div>
            @endforeach

    </div>
    @endforeach

</div>
