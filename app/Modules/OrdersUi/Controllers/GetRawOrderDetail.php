<?php

namespace App\Modules\OrdersUi\Controllers;


use App\Models\RawOrder;
use App\Models\RawOrderProduct;
use Lorisleiva\Actions\Concerns\AsAction;

class GetRawOrderDetail
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(RawOrder $order)
    {

        return $order->load('orderProducts.product')->products->map(function ($product) {
            return [
                'name' => $product->product->name_fr,
                'price' => number_format($product->price, 2, '.', ',') . ' DA',
                'qty' => $product->qty,
                'discount' => '0 DA',
                'total'=>number_format($product->qty*$product->price, 2, '.', ',') . ' DA'
            ];
        });

    }


}
