<?php

namespace App\Modules\OrdersLogic\Controllers\raw;



use App\Models\RawOrder;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateOrder
{
    use AsAction;

    public function asController(ActionRequest $request, RawOrder $order)
    {

        return redirect()->route('admin.orders.raw.toorder',['order'=>$order]);
    }


    public function authorize()
    {
        return auth()->user()->can('edit_raw_order');
    }
}
