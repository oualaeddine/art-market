<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;


use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientAddress;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreAddress
{
    use AsAction;

    public function asController(ActionRequest $request, Client $client)
    {

        $this->handle($request, $client);

        Session::flash('message', app()->getLocale()=='ar'?'تمت إضافة العنوان بنجاح': 'Adresse ajouté avec succès');

        return redirect()->back()->with(['#'=>'step6']);
    }

    public function handle(ActionRequest $request, Client $client)
    {
        ClientAddress::create($this->getClientAddressFields($request) + ['client_id' => auth()->guard('client')->id()]);
    }

    private function getClientAddressFields($request): array
    {
        return $request->only(['address', 'code_postal', 'commune_id']);
    }

    public function rules(): array
    {
        Session::put(['profile_tab'=>'profile-tab']);

        return [
            'address' => ['required', 'string', 'max:255'],
            'code_postal' => ['nullable','sometimes'],
            'commune_id' => ['required', 'exists:yalidine_mairies,id']
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'address' => 'address',
            'code_postal' => 'code postal',
            'commune_id' => 'commune',
        ];
    }
}
