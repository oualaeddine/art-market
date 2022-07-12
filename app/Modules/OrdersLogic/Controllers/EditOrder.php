<?php

namespace App\Modules\OrdersLogic\Controllers;



use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Lorisleiva\Actions\Concerns\AsAction;

class EditOrder
{
    use AsAction;

    public function handle(Request $request,Order $order)
    {
        return Response::json([
            'success' => true,
            'data' => $order->toArray(),
        ], 200);
    }

}
