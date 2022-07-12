<?php

namespace App\Modules\OrdersLogic\Controllers;

use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteOrder
{
    use AsAction;

    public function asController(Order $order)
    {
        $this->handle($order);
        Session::flash('success', 'Commande archivé avec succès');
        return redirect()->back();
    }

    public function handle($order): void
    {
        $order->delete();
    }


}
