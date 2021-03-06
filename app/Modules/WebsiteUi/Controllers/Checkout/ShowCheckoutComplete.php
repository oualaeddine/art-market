<?php

namespace App\Modules\WebsiteUi\Controllers\Checkout;

use App\Helpers\SetLocal;
use App\Models\RawOrder;
use App\Modules\OrdersLogic\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowCheckoutComplete
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request, $order)
    {

        $normal_orders = Order::query()->with('products.instance')->where('tracking_code',$order)->get();


        if ($normal_orders->isEmpty()) {
            $raw_orders = RawOrder::query()->with('products.instance')->where('tracking_code',$order)->get();

        }

        if ($normal_orders->isEmpty() && $raw_orders->isEmpty()) {

            Toastr::error(trans('No order was found'), '', ["positionClass" => "toast-bottom-right"]);
            return redirect()->back();
        }

        $orders=$normal_orders->isEmpty()?$raw_orders:$normal_orders;


        return view('WebsiteUi::checkout-done', compact('order','orders'))->with(['page_title' => trans('Checkout complete')]);
    }

}
