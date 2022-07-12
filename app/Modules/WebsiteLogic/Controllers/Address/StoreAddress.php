<?php

namespace App\Modules\WebsiteLogic\Controllers\Address;

use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientAddress;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreAddress
{
    use AsAction;

//    public function authorize()
//    {
//        return auth()->user()->can('edit_detail_client');
//    }
    public function asController(ActionRequest $request, Client $client)
    {

        $this->handle($request, $client);

        Session::flash('message', 'Adresse ajouté avec succès');

        return redirect()->back();
    }

    public function handle(ActionRequest $request, Client $client)
    {
        ClientAddress::create($this->getClientAddressFields($request) + ['client_id' => $client->id]);
    }

    private function getClientAddressFields($request): array
    {
        return $request->only(['address', 'observation', 'code_postal', 'commune_id']);
    }

    public function rules(): array
    {
        return [
            'address' => ['required', 'string', 'max:255'],
            'observation' => ['nullable','sometimes','max:255'],
            'code_postal' => ['nullable','sometimes'],
            'commune_id' => ['required', 'exists:yalidine_mairies,id']
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'address' => 'address',
            'observation' => 'observation',
            'code_postal' => 'code postal',
            'commune_id' => 'commune',
        ];
    }
}
