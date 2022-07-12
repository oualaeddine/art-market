<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\clients;

use App\Models\ClientsVendor;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteClient
{
    use AsAction;

    public function asController(ClientsVendor $clients_vendor)
    {
        $this->handle($clients_vendor);
        Session::flash('success', 'Client supprimer avec succès.');
        return redirect()->route('vendor.clients.index');
    }

    public function handle($clients_vendor)
    {

        $clients_vendor->delete();


    }


}
