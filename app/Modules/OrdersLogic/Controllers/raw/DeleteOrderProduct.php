<?php

namespace App\Modules\OrdersLogic\Controllers\raw;


use App\Models\RawOrderProduct;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteOrderProduct
{
    use AsAction;

    public function asController(RawOrderProduct $order_product)
    {
        DB::beginTransaction();
        try {
            $order_product->load('order');
            $order=$order_product->order;
            $this->handle($order,$order_product);
            Session::flash('success', 'Produit supprimé avec succès');
            DB::commit();
        }catch (\Throwable $exception){
            Session::flash('error', 'quelque chose s\'est mal passé');
            DB::rollBack();
            dd($exception);
        }

        return redirect()->back();
    }

    public function handle($order,$order_product): void
    {

        $order->decrement('sub_total',($order_product->price*$order_product->qty));
        $order->decrement('total',($order_product->price*$order_product->qty));
        $order_product->delete();
    }
//    public function authorize()
//    {
//        return auth()->user()->can('delete_raw_order');
//    }

}
