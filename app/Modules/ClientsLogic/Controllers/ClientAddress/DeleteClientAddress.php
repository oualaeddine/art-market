<?php

namespace App\Modules\ClientsLogic\Controllers\ClientAddress;


use App\Modules\ClientsLogic\Models\ClientAddress;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteClientAddress
{
    use AsAction;

//    public function authorize()
//    {
//        return auth()->user()->can('edit_detail_client');
//    }

    public function asController(ClientAddress $client_address)
    {

        $this->handle($client_address);

        Session::flash('message', 'Adresse archivé avec succés');

        return redirect()->back();

    }

    public function handle($client_address)
    {
        $client_address->delete();
    }
}
