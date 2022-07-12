<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor;

use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateVendorUser
{
    use AsAction, UploadImageTrait;

    public function asController(ActionRequest $request)
    {
        if ($request->phone==0){
            Session::flash('error','Le format du champ téléphone est incorrect');
            return redirect()->back()->withInput();
        }
        $this->handle($request);
        Session::flash('success', 'Utilisateur mis à jour avec succès.');
        return redirect()->route('vendor.user.profile');
    }

    public function handle(ActionRequest $request)
    {
        $user= auth()->guard('vendor')->user();

        $user->update([
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        if ($request->filled('password')){
            $user->update([
               'password'=>Hash::make($request->password)
            ]);
        }

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
            'phone' => ['required', 'unique:vendor_users,phone,'.auth()->guard('vendor')->id(), new PhoneNumber()],
            'email' => 'required|email|unique:users|unique:vendor_users,email,'.auth()->guard('vendor')->id(),
            'password'=>['nullable','sometimes','confirmed','min:8']
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'name_ar' => 'nom en ar',
            'name_fr' => 'nom en fr',
        ];
    }

}
