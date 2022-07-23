<?php

namespace App\Modules\WebsiteLogic\Controllers\Address;

use App\Modules\ClientsLogic\Models\ClientAddress;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateAddress
{
    use AsAction;

//    public function authorize()
//    {
//        return auth()->user()->can('edit_detail_client');
//    }


    public function asController(ActionRequest $request, ClientAddress $client_address)
    {


        $this->handle($request, $client_address);
        Toastr::success(trans('Address updated successfully'), '', ["positionClass" => "toast-bottom-right"]);

        return redirect()->back()->with(['tab'=>'address']);

    }

    public function handle(ActionRequest $request, ClientAddress $client_address)
    {
        $new_address=$client_address->replicate();
        $client_address->delete();

        $new_address->save();
        $new_address->update($this->getClientAddressFields($request));
    }


    private function getClientAddressFields($request): array
    {
        return $request->only(['address', 'code_postal', 'commune_id']);
    }

    public function rules(): array
    {
        return [
            'address' => ['required', 'string', 'max:255'],
            'code_postal' => ['nullable','sometimes','string'],
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
