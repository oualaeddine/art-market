<?php

namespace App\Modules\ClientsLogic\Controllers\ClientAddress;

use App\Modules\ClientsLogic\Models\ClientAddress;
use Lorisleiva\Actions\Concerns\AsAction;

class GetClientAddress
{
    use AsAction;

//    public function authorize()
//    {
////        return auth()->user()->can('edit_detail_client');
//    }

    public function handle(ClientAddress $client_address)
    {
        $client_address->load('commune.yalidineWilaya');
        return [
            'code_postal' => $client_address->code_postal,
            'address' => $client_address->address,

            'commune_name' => $client_address->commune->name,
            'commune_id' => $client_address->commune->id,

            'wilaya_name' => $client_address->commune->yalidineWilaya->name,
            'wilaya_id' => $client_address->commune->yalidineWilaya->id,
        ];
    }

}
