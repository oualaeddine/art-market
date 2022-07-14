<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use App\Helpers\GetCleanPhoneNumber;
use App\Modules\ClientsLogic\Models\Client;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateProfile
{
    use AsAction;


    public function getValidationRedirect()
    {
        return route('client.account', '#step2');
    }

    public function prepareForValidation(ActionRequest $request): void
    {
        $request->merge(['phone' => GetCleanPhoneNumber::getPhone($request->phone)]);
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:45'],
            'last_name' => ['required', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:45'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
//            'wilaya' => ['required'],
//            'commune_id' => ['required'],
            'phone' => ['required', new PhoneNumber, 'numeric', Rule::unique('clients')->where(function ($query) {
                return $query->where('phone', request()->phone);
            })->ignore(request()->client)],

            'email' => ['required', 'email', Rule::unique('clients')->where(function ($query) {
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
            'commune_id' => trans('Commune'),
            'Wilaya' => trans('wilaya')
        ];
    }

    public function asController(ActionRequest $request)
    {
        if ($request->phone == 0) {
            Session::flash('error', trans('The phone number format is wrong'));
            return redirect()->back()->withInput();
        }
        $client=auth()->guard('client')->user();
        $this->handle($request, $client);

        Session::flash('message', trans('Updated successfully'));

        return redirect()->route('client.account', '#step2');
    }

    public function handle(ActionRequest $request,$client)
    {

        $client->update($this->getClientFields($request));
        if ($request->filled('password'))
            $client->update([
               'password'=>Hash::make($request->password)
            ]);
    }

    private function getClientFields($request): array
    {
        return $request->only(['first_name', 'last_name', 'wilaya', 'phone', 'email', 'commune_id']);
    }


}
