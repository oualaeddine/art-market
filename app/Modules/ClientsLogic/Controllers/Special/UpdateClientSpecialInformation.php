<?php

namespace App\Modules\ClientsLogic\Controllers\Special;

use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientPhone;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateClientSpecialInformation
{
    use AsAction, UploadImageTrait;


    public function prepareForValidation(ActionRequest $request): void
    {
        $request->merge(['phone' => $this->getPhoneNumberClean($request->phone)]);
    }

    private function getPhoneNumberClean($phone)
    {
        if (Str::startsWith($phone, '00213') && strlen($phone) === 14) return explode('00213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0213') && strlen($phone) === 13) return explode('0213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '+213') && strlen($phone) === 13) return explode('+213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '213') && strlen($phone) === 12) return explode('213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0') && strlen($phone) === 10) return explode('0', $phone, 2)[1];
        elseif ((Str::startsWith($phone, '6') || Str::startsWith($phone, '5') || Str::startsWith($phone, '7')) && strlen($phone) === 9) return $phone;
        else return 0;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:45'],
            'last_name' => ['required', 'string', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:45'],
            'commune_id' => ['required', 'exists:yalidine_mairies,id'],
            'wilaya' => ['required'],
            'phone' => ['required', 'numeric', new PhoneNumber, Rule::unique('clients', 'phone')->ignore(request()->client->id)],
            'email' => ['required', 'email', Rule::unique('clients', 'email')->ignore(request()->client->id)],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'first_name' => 'nom',
            'last_name' => 'prènom',
            'commune_id' => 'commune',
            'phone' => 'téléphone',
        ];

    }

    public function asController(ActionRequest $request, Client $client)
    {

        if ($request->phone == 0) {
            Session::flash('error', 'Le format du champ téléphone est incorrect');
            return redirect()->back()->withInput();
        }

        $this->handle($request, $client);

        Session::flash('message', 'Client mis à jour avec succés');

        return redirect()->back();
    }

    public function handle(ActionRequest $request, Client $client)
    {
        $client->update($this->getClientSpecialInfoFields($request));
    }

    private function getClientSpecialInfoFields($request): array
    {
        return $request->only(['first_name', 'last_name', 'commune_id', 'wilaya', 'phone', 'email']);
    }

//    public function authorize()
//    {
//        return auth()->user()->can('view_detail_client');
//    }


}
