<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use App\Modules\OrdersLogic\Models\Order;
use App\Modules\OrdersLogic\Models\Order_product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateOrderQty
{
    use AsAction;


    public function asController(ActionRequest $request, Order_product $product)
    {
        $product->load('order');
        $product->load('product');
        $order=$product->order;
        if (!in_array($order->status, ['completed', 'canceled']) && ($order->client == auth()->guard('client')->id())) {
            $this->handle($request, $order,$product);
            Toastr::success(trans('Order updated successfully'), '', ["positionClass" => "toast-bottom-right"]);

        } else {
            Toastr::error(trans('Order can not be updated'), '', ["positionClass" => "toast-bottom-right"]);

        }

        return redirect()->back()->with(['tab' => 'orders']);

    }

    public function handle($request, $order,$product)
    {

        $old_prod_price=$product->price*$product->quantity;
        $new_prod_price=$product->price*$request->qty;



        $shipping=($product->product->shipping??0)*$product->quantity;

        $new_shipping=($product->product->shipping??0)*$request->qty;

        $order->decrement('sub_total',($old_prod_price));
        $order->decrement('total',($old_prod_price+$shipping));
        $order->decrement('shipping',$shipping);

        $order->increment('sub_total',($new_prod_price));
        $order->increment('total',($new_prod_price+$new_shipping));
        $order->increment('shipping',$new_shipping);

        $product->update(['quantity'=>$request->qty]);
    }

    public function rules()
    {
        return [
            'qty' => ['required', 'numeric','gt:0']
        ];
    }


}
