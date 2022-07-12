<?php

namespace App\Modules\VendorsLogic\Controllers\orders\normal;


use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteOrderVendor
{
    use AsAction;

    public function asController(Order $order)
    {
        $this->handle($order);
        Session::flash('success', 'Commande supprimé avec succès');
        return redirect()->route('admin.vendors.detail',['vendor'=>$order->vendor_id,'type'=>'all','#Orders']);
    }

    public function handle($order): void
    {
        $order->delete();
    }


}
