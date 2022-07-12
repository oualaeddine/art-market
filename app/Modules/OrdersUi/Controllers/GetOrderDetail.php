<?php

namespace App\Modules\OrdersUi\Controllers;

use App\Models\ProductCoupon;

use App\Modules\Extra\GenerateHeader;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\OrdersLogic\Models\OrderCoupon;
use App\Modules\OrdersLogic\Models\Raw_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class GetOrderDetail
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Order $order)
    {

        return $order->load('orderProducts.product')->orderProducts->map(function ($product) {
            return [
                'name' => $product->product->name_fr,
                'price' => number_format($product->price, 2, '.', ',') . ' DA',
                'qty' => $product->quantity,
                'discount' => number_format(0, 2, '.', ',') . ' DA',
                'total'=>number_format($product->quantity*$product->price, 2, '.', ',') . ' DA'
                ];
        });

    }


}
