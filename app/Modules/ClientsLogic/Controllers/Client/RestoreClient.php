<?php

namespace App\Modules\ClientsLogic\Controllers\Client;


use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientPhone;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class RestoreClient
{
    use AsAction;

    public function handle(Client $client)
    {
        $client->restore();
    }

    public function asController(Client $client)
    {
        $this->handle($client);
        Session::flash('message','Client restaurer avec succès');
        return redirect()->route('admin.clients.special',['client'=>$client->id]);
    }
//
//    public function authorize()
//    {
//        return auth()->user()->can('delete_client');
//    }

}
