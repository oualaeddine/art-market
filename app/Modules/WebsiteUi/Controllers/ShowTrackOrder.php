<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
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
        $lang = Session::get('client_lang');

        if($lang){
            SetLocal::generate('ar');
        }

        $order = null;

        $track_id = $request->tracking ?? null;

        if($track_id){
            $order = Order::where('tracking_code',$track_id)->with('products.product')->first();
        }
        
        return view('WebsiteUi::order-track',compact('order','track_id'))->with(['page_title' => 'Order Tracking']);
    }

}
