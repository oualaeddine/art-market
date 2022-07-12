<?php

namespace App\Modules\OrdersLogic\Controllers\raw;


use App\Models\RawOrder;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class RestoreOrder
{
    use AsAction;

    public function asController(RawOrder $order)
    {
        $this->handle($order);
        Session::flash('success', 'Commande restaurer avec succès');
        return redirect()->back();
    }

    public function handle($order): void
    {
        $order->restore();
    }
    public function authorize()
    {
        return auth()->user()->can('delete_raw_order');
    }

}
