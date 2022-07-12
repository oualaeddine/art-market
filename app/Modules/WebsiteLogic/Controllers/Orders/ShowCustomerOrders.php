<?php

namespace App\Modules\WebsiteLogic\Controllers\Orders;

use App\Modules\ClientsLogic\Models\Client;
use App\Modules\OrdersLogic\Models\Order;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowCustomerOrders
{
    use AsAction;


    public function handle(ActionRequest $request,Client $client)
    {
        return Order::query()->where('client',$client->id)->with('product')->paginate(10);
    }

    public function asController(ActionRequest $request,Client $client)
    {
        $this->handle($request,$client);

        return redirect()->back();

    }


}
