<?php

namespace App\Modules\ClientsLogic\Controllers\Client;


use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientPhone;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class ArchiveClient
{
    use AsAction;

    public function handle(Client $client)
    {
        $client->delete();
    }

    public function asController(Client $client)
    {
        $this->handle($client);
        Session::flash('message','Client archivé avec succès');
        return redirect()->back();
    }

//    public function authorize()
//    {
//        return auth()->user()->can('delete_client');
//    }

}
