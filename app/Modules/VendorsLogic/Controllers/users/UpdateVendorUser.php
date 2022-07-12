<?php

namespace App\Modules\VendorsLogic\Controllers\users;

use App\Models\Vendor;
use App\Models\VendorUser;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateVendorUser
{
    use AsAction, UploadImageTrait;

    public function asController(ActionRequest $request,VendorUser $user)
    {
        $this->handle($request,$user);
        Session::flash('success', 'Utilisateur mis à jour avec succès.');
        return redirect()->route('admin.vendors.detail',['vendor'=>$user->vendor_id,'type'=>'all','#Users']);
    }

    public function handle(ActionRequest $request,$user)
    {

        $user->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'is_active' => $request->is_active
        ]);
        if ($request->filled('password'))
            $user->update([
               'password'=>Hash::make($request->password)
            ]);

        $user->roles()->sync($request->roles);

    }


    public function rules(): array
    {
        return [
            'phone' => ['required', 'unique:vendor_users,phone,'.request()->user->id, new PhoneNumber()],
            'email' => 'required|email|unique:users|unique:vendor_users,email,'.request()->user->id,
            'is_active' => 'required|in:0,1',
            'roles'=>['required','array'],
            'roles.*'=>['exists:roles,id'],
            'password'=>['nullable','string','confirmed']
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'name_ar' => 'nom en ar',
            'name_fr' => 'nom en fr',
            'password'=>'Nouveau mot de passe',
            'password_confirmation'=>'Confirmation de nouveau mot de passe',
        ];
    }

}
