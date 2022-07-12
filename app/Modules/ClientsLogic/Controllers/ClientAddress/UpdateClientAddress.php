<?php

namespace App\Modules\ClientsLogic\Controllers\ClientAddress;

use App\Modules\ClientsLogic\Models\ClientAddress;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateClientAddress
{
    use AsAction;

//    public function authorize()
//    {
//        return auth()->user()->can('edit_detail_client');
//    }


    public function asController(ActionRequest $request, ClientAddress $client_address)
    {


        $this->handle($request, $client_address);

        Session::flash('message', 'Adresse mis à jour avec succès');

        return redirect()->back();

    }

    public function handle(ActionRequest $request, ClientAddress $client_address)
    {
        $client_address->update($this->getClientAddressFields($request));
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
            'code_postal' => ['nullable','sometimes','string'],
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
