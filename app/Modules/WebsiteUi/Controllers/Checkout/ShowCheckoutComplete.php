<?php

namespace App\Modules\WebsiteUi\Controllers\Checkout;

use App\Helpers\SetLocal;
use App\Models\RawOrder;
use App\Modules\OrdersLogic\Models\Order;
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
        $lang = Session::get('client_lang');

        if ($lang) {
            SetLocal::generate('ar');
        }

        $normal_orders = Order::query()->with('orderProducts')->where('tracking_code',$order)->get();


        if ($normal_orders->isEmpty()) {
            $raw_orders = RawOrder::query()->with('orderProducts')->where('tracking_code',$order)->get();

        }

        if ($normal_orders->isEmpty() && $raw_orders->isEmpty()) {
            Session::flash('error', Session::get('client_lang') ? 'لم يتم العثور على الطلب' : 'aucune commande n\'a été trouvée');
            return redirect()->back();
        }

        $orders=$normal_orders->isEmpty()?$raw_orders:$normal_orders;


        return view('WebsiteUi::checkout.order-complete', compact('orders'))->with(['page_title' => 'Checkout | Complete']);
    }

}
