<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\clients;

use App\Models\ClientsVendor;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreClient
{
    use AsAction;

    public function asController(ActionRequest $request)
    {

        $this->handle($request);
        Session::flash('success', 'Client ajouté avec succès.');
        return redirect()->route('vendor.clients.index');
    }

    public function handle(ActionRequest $request)
    {

        ClientsVendor::query()->create([

            'vendor_id' => auth()->guard('vendor')->user()->vendor_id,
            'client_id' => $request->client_id
        ]);

    }


    public function rules(): array
    {
        return [
            'client_id' => ['required', 'exists:clients,id']
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'name_ar' => 'nom en ar',
            'name_fr' => 'nom en fr',
        ];
    }

}
