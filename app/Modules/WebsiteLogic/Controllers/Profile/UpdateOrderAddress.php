<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use App\Modules\OrdersLogic\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateOrderAddress
{
    use AsAction;


    public function asController(ActionRequest $request, Order $order)
    {
        if (!in_array($order->status, ['completed', 'canceled']) && ($order->client == auth()->guard('client')->id())) {
            $this->handle($request, $order);
            Toastr::success(trans('Order updated successfully'), '', ["positionClass" => "toast-bottom-right"]);

        } else {
            Toastr::error(trans('Order can not be updated'), '', ["positionClass" => "toast-bottom-right"]);

        }

        return redirect()->back()->with(['tab' => 'orders']);

    }

    public function handle(ActionRequest $request, Order $order)
    {
        $order->update(['address_id' => $request->address_id]);
    }

    public function rules()
    {
        return [
            'address_id' => ['required', Rule::exists('client_addresses', 'id')->where('client_id', auth()->guard('client')->id())]
        ];
    }


}
