<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;


use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientAddress;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreAddress
{
    use AsAction;

    public function asController(ActionRequest $request)
    {
        $client=auth()->guard('client')->user();
        $this->handle($request, $client);
        Toastr::success(trans('Address added successfully'), '', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }

    public function handle(ActionRequest $request, $client)
    {
        ClientAddress::create($this->getClientAddressFields($request) + ['client_id' => $client->id]);
    }

    private function getClientAddressFields($request): array
    {
        return $request->only(['address', 'code_postal', 'commune_id']);
    }

    public function rules(): array
    {

        return [
            'address' => ['required', 'string', 'max:255'],
            'code_postal' => ['nullable','sometimes'],
            'commune_id' => ['required', 'exists:yalidine_mairies,id']
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'address' => trans('Address'),
            'code_postal' => trans('Zip'),
            'commune_id' => trans('Commune'),
        ];
    }
}
