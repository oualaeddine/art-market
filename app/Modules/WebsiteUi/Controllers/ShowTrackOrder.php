<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Models\RawOrder;
use App\Modules\OrdersLogic\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowTrackOrder
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {



        $track_id = $request->tracking ?? null;
        $orders = Order::query()->with('vendor')->with('products.product')->where('tracking_code', $track_id)->get();
        $raw_orders = RawOrder::query()->with('vendor')->with('products.product')->where('tracking_code', $track_id)->get();

//        if ($orders->isEmpty() && $raw_orders->isEmpty()) {
//            Toastr::error(trans('No orders were found by this tracking code'), '', ["positionClass" => "toast-bottom-right"]);
//        }

        return view('WebsiteUi::order-track', compact( 'track_id','orders','raw_orders'))->with(['page_title' => trans('Order Tracking')]);
    }

}
