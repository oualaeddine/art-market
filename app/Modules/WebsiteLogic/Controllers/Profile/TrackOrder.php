<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use App\Helpers\SetLocal;
use App\Models\RawOrder;
use App\Modules\OrdersLogic\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class TrackOrder
{
    use AsAction;


    public function asController(ActionRequest $request)
    {

        $orders = Order::query()->with('vendor')->where('tracking_code', $request->tracking_code)->get();
        $raw_orders = RawOrder::query()->with('vendor')->where('tracking_code', $request->tracking_code)->get();

        if ($orders->isEmpty() && $raw_orders->isEmpty()) {
            Toastr::error(trans('No orders were found by this tracking code'), '', ["positionClass" => "toast-bottom-right"]);

            return redirect()->back();
        }


        return view('WebsiteUi::order-track-result', ['page_title' => 'Tracking', 'orders' => $orders, 'raw_orders' => $raw_orders]);

    }


    public function rules()
    {
        return ['tracking_code' => ['required', 'string']];
    }

}
