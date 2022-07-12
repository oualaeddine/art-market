<?php

namespace App\Modules\VendorsLogic\Controllers\orders\raw;


use App\Models\ProductCoupon;

use App\Models\RawOrder;
use App\Modules\Extra\GenerateHeader;
use App\Modules\OrdersLogic\Models\OrderCoupon;
use App\Modules\OrdersLogic\Models\Raw_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class GetRawOrderDetailVendor
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(RawOrder $order)
    {

        return $order->load('products.product')->products->map(function ($product) {
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
