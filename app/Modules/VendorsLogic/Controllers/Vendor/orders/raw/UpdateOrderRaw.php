<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\orders\raw;




use App\Models\RawOrder;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateOrderRaw
{
    use AsAction;

    public function asController(ActionRequest $request, RawOrder $order)
    {

        return redirect()->route('vendor.orders.raw.toorder',['order'=>$order]);
    }


//    public function authorize()
//    {
//        return auth()->user()->can('edit_raw_order');
//    }
}
