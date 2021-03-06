<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use App\Helpers\GetCleanPhoneNumber;
use App\Models\YalidineWilaya;
use App\Rules\PhoneNumber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
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
            'wilaya' => ['required'],
            'commune_id' => ['required'],
            'phone' => ['required', new PhoneNumber, 'numeric', 'unique:clients,phone,' . auth()->guard('client')->id()],

            'email' => ['required', 'email', 'unique:clients,email,' . auth()->guard('client')->id()],
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


        if (!$this->isValidPhone($request->phone)) {
            Toastr::error(trans('The phone number format is wrong'), '', ["positionClass" => "toast-top-center"]);

            return redirect()->back()->withInput();
        }


        $client = auth()->guard('client')->user();
        $this->handle($request, $client);
        Toastr::success(trans('Profile Updated successfully'), '', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('client.account',['tab'=>'account']);
    }

    private function isValidPhone($phone)
    {
        return $phone != 0;
    }

    public function handle(ActionRequest $request, $client)
    {

        $client->update($this->getClientFields($request));
        if ($request->filled('password'))
            $client->update([
                'password' => Hash::make($request->password)
            ]);

        if ($request->filled('wilaya_id') && $request->filled('commune_id')){
            $client->update([
               'commune_id'=>$request->commune_id,
               'wilaya'=>YalidineWilaya::query()->find($request->wilaya_id)?->name
            ]);
        }
    }

    private function getClientFields($request): array
    {
        return $request->only(['first_name', 'last_name', 'wilaya', 'phone', 'email', 'commune_id']);
    }


}
