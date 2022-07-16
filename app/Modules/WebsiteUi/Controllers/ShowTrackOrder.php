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

        $order = null;

        $track_id = $request->tracking ?? null;

        if (RawOrder::query()->whereTrackingCode($track_id)->first()) Toastr::warning(trans('Order waiting for confirmation'), '', ["positionClass" => "toast-bottom-right"]);

        if ($track_id) {
            $order = Order::where('tracking_code', $track_id)->with('products.product')->first();
        }

        return view('WebsiteUi::order-track', compact('order', 'track_id'))->with(['page_title' => trans('Order Tracking')]);
    }

}
