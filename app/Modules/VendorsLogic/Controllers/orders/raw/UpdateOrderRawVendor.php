<?php

namespace App\Modules\VendorsLogic\Controllers\orders\raw;



use App\Models\RawOrder;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateOrderRawVendor
{
    use AsAction;

    public function asController(ActionRequest $request, RawOrder $order)
    {

        return redirect()->route('admin.vendors.orders.raw.toorder',['order'=>$order]);
    }


    public function authorize()
    {
        return auth()->user()->can('edit_raw_order');
    }
}
