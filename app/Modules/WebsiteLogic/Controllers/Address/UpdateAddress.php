<?php

namespace App\Modules\WebsiteLogic\Controllers\Address;

use App\Modules\ClientsLogic\Models\ClientAddress;
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

        Session::flash('message',Session::get('client_lang')?'تم تحديث العنوان بنجاح': 'Adresse mis à jour avec succès');
        return redirect()->back();

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
        Session::put(['profile_tab'=>'profile-tab']);

        return [
            'address' => ['required', 'string', 'max:255'],
            'code_postal' => ['nullable','sometimes','string'],
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
