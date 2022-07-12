<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use App\Helpers\SetLocal;
use App\Models\RawOrder;
use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class TrackOrder
{
    use AsAction;


    public function asController(ActionRequest $request)
    {
        $lang = Session::get('client_lang');

        if ($lang) {
            SetLocal::generate('ar');
        }


        $orders = Order::query()->with('vendor')->where('tracking_code', $request->tracking_code)->get();
        $raw_orders = RawOrder::query()->with('vendor')->where('tracking_code', $request->tracking_code)->get();

        if ($orders->isEmpty() && $raw_orders->isEmpty()) {
            Session::flash('error', Session::get('client_lang') ? 'لم يتم العثور على أي طلب من خلال رمز التتبع' : 'aucune commande n\'a été trouvée par ce code de suivi');
            return redirect()->back();
        }


        return view('WebsiteUi::order-track-result', ['page_title' => 'Tracking', 'orders' => $orders, 'raw_orders' => $raw_orders]);

    }


    public function rules()
    {
        return ['tracking_code' => ['required', 'string']];
    }

}
