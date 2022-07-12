<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\orders\raw;


use App\Models\ProductCoupon;

use App\Modules\ClientsLogic\Models\Client;
use App\Modules\Extra\GenerateHeader;
use App\Modules\OrdersLogic\Models\OrderCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class GetAddresses
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request,Client $client)
    {

        $client->load('addresses');
        $addresses=$client->addresses->map(function ($address){
            return[
              'id'=>$address->id,
              'address'=>$address->address
            ];
        });
        return response()->json($addresses);


    }



}
