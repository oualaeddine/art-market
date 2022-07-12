<?php

namespace App\Modules\OrdersLogic\Controllers\raw;


use App\Models\RawOrder;
use App\Modules\OrdersLogic\Models\OrderCoupon;
use App\Modules\OrdersLogic\Models\Raw_order;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteOrder
{
    use AsAction;

    public function asController(RawOrder $order)
    {
        $this->handle($order);
        Session::flash('success', 'Commande archivé avec succès');
        return redirect()->back();
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
