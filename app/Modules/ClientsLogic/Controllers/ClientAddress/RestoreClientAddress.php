<?php

namespace App\Modules\ClientsLogic\Controllers\ClientAddress;


use App\Modules\ClientsLogic\Models\ClientAddress;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class RestoreClientAddress
{
    use AsAction;


    public function asController(ClientAddress $client_address)
    {

        $this->handle($client_address);

        Session::flash('message', 'Adresse restauré avec succés');

        return redirect()->back();

    }

    public function handle(ClientAddress $client_address)
    {
        $client_address->restore();
    }
}
