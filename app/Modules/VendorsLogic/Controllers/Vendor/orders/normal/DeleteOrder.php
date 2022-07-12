<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\orders\normal;


use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteOrder
{
    use AsAction;

    public function asController(Order $order)
    {
        $this->handle($order);
        Session::flash('success', 'Commande supprimé avec succès');
        return redirect()->route('vendor.orders.index');
    }

    public function handle($order): void
    {
        $order->delete();
    }


}
