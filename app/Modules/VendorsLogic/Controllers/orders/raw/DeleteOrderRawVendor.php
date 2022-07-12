<?php

namespace App\Modules\VendorsLogic\Controllers\orders\raw;


use App\Models\RawOrder;
use App\Modules\OrdersLogic\Models\OrderCoupon;
use App\Modules\OrdersLogic\Models\Raw_order;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteOrderRawVendor
{
    use AsAction;

    public function asController(RawOrder $order)
    {
        $this->handle($order);
        Session::flash('success', 'Commande supprimé avec succès');
        return redirect()->route('admin.vendors.detail',['vendor'=>$order->vendor_id,'type'=>'all','#RawOrders']);
    }

    public function handle($order): void
    {
        $order->delete();
    }
    public function authorize()
    {
        return auth()->user()->can('delete_raw_order');
    }

}
