<?php

namespace App\Modules\ClientsLogic\Controllers\Client;


use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientPhone;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class GetClient
{
    use AsAction;

    public function handle(Client $client)
    {

    }

    public function asController(Client $client)
    {
        $client->load('commune.yalidineWilaya');
       return Response::json([
           'client' => $client,
           'client_address' => $client->client_address
       ]);
    }


}
