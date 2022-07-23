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
    @if($client->orders->isNotEmpty())
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
                <div>
                    <div class="row">
                                 <span class=" badge badge-pill {{"badge-$color"}}"
                                       style="font-size: small;">{{ucfirst(trans($order->status))}}</span>

                        <span class="badge badge-pill badge-default"
                              style="font-size: small;">{{trans("order ID")." : ".$order->tracking_code}}</span>
                        <span class="badge badge-pill badge-default"
                              style="font-size: small;">{{trans("Update date")." : ".$order->updated_at->format('d-m-Y H:i')}}</span>
                        <span class="badge badge-pill badge-default"
                              style="font-size: small;">{{trans("Total")." : ".number_format($order->total,2).trans('DA')}}</span>
                        <span class="badge badge-pill badge-default"
                              style="font-size: small;">{{trans("Shipping")." : ".number_format($order->shipping,2).trans('DA')}}</span>
                        <span class="badge badge-pill badge-default"
                              style="font-size: small;">{{trans("Delivery address")." : ".$order->address->address}}</span>
                    </div>


                    <div class="row justify-content-end">

                    @if(!in_array($order->status,['completed','canceled']))
                        <a class="cart__remove text-right js-popup-open mr-2" onclick="EditOrderAddress({{$order->id}},{{$order->address_id}})" data-effect="mfp-zoom-in" tabindex="0"
                           href="#EditeOrderAddressModal" href="javascript:void(0)"><i class="fal fa-edit"></i> {{__("Address")}}</a>

                        <a class="cart__remove text-right  js-popup-open " onclick="DeleteOrder({{$order->id}})" data-effect="mfp-zoom-in" tabindex="0"
                           href="#DeleteOrderModal" href="javascript:void(0)"><i class="fal fa-times"></i> {{__("REMOVE")}}</a>


                    @endif
                    </div>

                </div>

            </div>

            <div class="order__items {{"border-$color"}}">
                @foreach($order->products as $item)
                    <div class="row justify-content-start w-100 align-items-center">
                        <a href="{{route('product',[$item->instance->slug])}}"
                           class="cart__preview col-md-1"><img
                                src="{{asset($item->instance->image??'/website/images/demo/product-0-8.jpeg')}}"
                                alt="item"/></a>

                        <div class="col-md-3">
                            <div
                                class="cart__subtitle">{{$item->instance->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</div>
                            <div class="cart__description">{{__("From vendor")}} <a
                                    href="{{route('vendor-detail',['vendor'=>$order->vendor->name_fr])}}">{{$order->vendor->{app()->getLocale()=='fr'?'name_fr':'name_ar'} }}</a>
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
                        @if(!in_array($order->status,['completed','canceled']))

                        <div class="col-md-1">
                            <div class="cart__prices">
                                <div
                                    class="the__price"><a class="js-popup-open" onclick="EditOrderQty({{$item->id}},{{$item->quantity}})" data-effect="mfp-zoom-in" tabindex="0"
                                                          href="#EditeOrderQtyModal" title="{{__("Edit quantity")}}" ><i class="fal fa-edit"></i></a></div>



                            </div>
                        </div>
                        @endif
                    </div>
                @endforeach

            </div>
        @endforeach

    @else
        <x-no-data  />
    @endif

    <x-delete-order />
    <x-edit-order-address-modal />
    <x-edit-order-qty-modal />
</div>
@push('js')
    <script>

        function DeleteOrder(id){
            var url_change_edit_form = '{{ route("cancel-order", ":order") }}';

            url_change_edit_form = url_change_edit_form.replace(':order', id);

            $('#DeleteOrderForm').attr('action', url_change_edit_form);
        }
        function EditOrderAddress(id,address_id){

            $("#address_id").val(address_id);
            var url_change_edit_form = '{{ route("update-order-address", ":order") }}';

            url_change_edit_form = url_change_edit_form.replace(':order', id);

            $('#EditeOrderAddressForm').attr('action', url_change_edit_form);
        }
        function EditOrderQty(product,val){

            $("#qty_edit").val(val);
            var url_change_edit_form = '{{ route("update-order-qty", ":product") }}';

            url_change_edit_form = url_change_edit_form.replace(':product', product);

            $('#EditeOrderQtyForm').attr('action', url_change_edit_form);
        }

    </script>
@endpush
