<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\users;

use App\Models\Vendor;
use App\Models\VendorUser;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateUser
{
    use AsAction;

    public function asController(ActionRequest $request,VendorUser $user)
    {

        if ($request->phone==0){
            Session::flash('error','Le format du champ téléphone est incorrect');
            return redirect()->back()->withInput();
        }
        $this->handle($request,$user);
        Session::flash('success', 'Utilisateur mis ajour avec succès.');
        return redirect()->route('vendor.users.index');
    }

    public function handle(ActionRequest $request,$user)
    {

        $user->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'is_active' => $request->is_active,
        ]);

        $user->roles()->sync($request->roles);


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
            'phone' => ['required', new PhoneNumber(),'unique:vendor_users,phone,'.request()->user->id],
            'email' => 'required|email|unique:vendor_users,email,'.request()->user->id,
            'is_active' => 'required|in:0,1',
            'roles'=>['required','array'],
            'roles.*'=>['exists:roles,id']
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
