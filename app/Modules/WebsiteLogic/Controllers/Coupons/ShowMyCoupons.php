<?php

namespace App\Modules\WebsiteLogic\Controllers\Coupons;


use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\Client_coupon;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowMyCoupons
{
    use AsAction;


    public function handle(ActionRequest $request,Client $client)
    {
        return Client_coupon::where('client_id',$client->id)->get();
    }

}
