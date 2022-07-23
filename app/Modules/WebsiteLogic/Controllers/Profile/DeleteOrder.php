<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use App\Models\User;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\OrdersLogic\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteOrder
{
    use AsAction;


    public function handle(ActionRequest $request, Order $order)
    {
        $order->update(['status' => 'canceled' , 'details' => $order->details .'- Le client annule la commande']);
    }

    public function asController(ActionRequest $request, Order $order)
    {
        if(!in_array($order->status,['completed','canceled']) && ($order->client ==auth()->guard('client')->id())){
            $this->handle($request,$order);
            Toastr::success(trans('Order updated successfully'), '', ["positionClass" => "toast-bottom-right"]);

        }else{
            Toastr::error(trans('Order can not be updated'), '', ["positionClass" => "toast-bottom-right"]);

        }

        return redirect()->back()->with(['tab'=>'orders']);

    }


}
