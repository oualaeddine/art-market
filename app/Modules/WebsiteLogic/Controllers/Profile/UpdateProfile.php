<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use App\Modules\ClientsLogic\Models\Client;
use App\Rules\PhoneNumber;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateProfile
{
    use AsAction;


    public function getValidationRedirect()
    {
        return route('client.account','#step2');
    }

    public function handle(ActionRequest $request, Client $client)
    {
        $client->update($this->getClientFields($request));
    }

    private function getClientFields($request): array
    {
        return $request->only(['first_name', 'last_name','wilaya','phone','email','commune_id']);
    }

    public function prepareForValidation(ActionRequest $request): void
    {
        $request->merge(['phone' => $this->getPhoneNumberClean($request->phone)]);
    }

    private function getPhoneNumberClean($phone)
    {
        if (Str::startsWith($phone, '00213') && strlen($phone) ===14) return explode('00213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0213') && strlen($phone) ===13) return explode('0213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '+213') && strlen($phone) ===13) return explode('+213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '213') && strlen($phone) ===12) return explode('213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0') && strlen($phone) ===10) return explode('0', $phone, 2)[1];
        elseif ((Str::startsWith($phone, '6') || Str::startsWith($phone, '5') || Str::startsWith($phone, '7')) && strlen($phone) ===9) return $phone;
        else return 0;
    }


    public function rules(): array
    {
        return [
            'first_name' => ['required', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:45'],
            'last_name' => ['required', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:45'],
            'wilaya' => ['required'],
            'commune_id' => ['required'],
            'phone' => ['required',new PhoneNumber,'numeric',Rule::unique('clients')->where(function ($query) {
                return $query->where('phone', request()->phone);
            })->ignore(request()->client)],

            'email' => ['required', 'email',Rule::unique('clients')->where(function ($query) {
                return $query->where('email', request()->email);
            })->ignore(request()->client)],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'first_name' => trans('Nom'),
            'last_name' => trans('Prènom'),
            'phone' => trans('Tèlèlphone'),
            'commune_id'=> trans('Commune'),
            'Wilaya'=> trans('wilaya')
        ];
    }

    public function asController(ActionRequest $request, Client $client)
    {
        if ($request->phone==0){
            Session::flash('error',Session::get('client_lang')?'حقل الهاتف غير صحيح':'Le format du champ téléphone est incorrect');
            return redirect()->back()->withInput();
        }
        $this->handle($request,$client);

        Session::flash('message',Session::get('client_lang')?'تم تحديث المعلومات بنجاح':'Informations mis à jour avec succés');

        return redirect()->route('client.account','#step2');
    }


}
