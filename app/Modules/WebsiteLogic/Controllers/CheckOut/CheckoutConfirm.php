<?php

namespace App\Modules\WebsiteLogic\Controllers\CheckOut;

use App\Helpers\SetLocal;
use App\Models\RawOrder;
use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class CheckoutConfirm
{
    use AsAction;


    public function handle(ActionRequest $request)
    {

    }

    public function asController(ActionRequest $request, $order)
    {

        $normal_orders = Order::query()->with('orderProducts')->where('tracking_code',$order)->get();


        if ($normal_orders->isEmpty()) {
            $raw_orders = RawOrder::query()->with('orderProducts')->where('tracking_code',$order)->get();

        }

        if ($normal_orders->isEmpty() && $raw_orders->isEmpty()) {
            Session::flash('error', Session::get('client_lang') ? 'لم يتم العثور على الطلب' : 'aucune commande n\'a été trouvée');
            return redirect()->back();
        }

        $orders=$normal_orders->isEmpty()?$raw_orders:$normal_orders;

        return redirect()->route('checkout.complete', $orders->first()->tracking_code);

    }


}
