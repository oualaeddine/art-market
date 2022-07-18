<?php

namespace App\Modules\VendorsLogic\Controllers;

use App\Models\Vendor;
use App\Modules\BrandsLogic\Models\Brand;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreVendor
{
    use AsAction, UploadImageTrait;

    public function asController(ActionRequest $request)
    {
        if ($request->phone==0){
            Session::flash('error','Le format du champ téléphone est incorrect');
            return redirect()->back()->withInput();
        }
        $this->handle($request);
        Session::flash('success', 'Vendeur ajouté avec succès.');
        return redirect()->route('admin.vendors.index');
    }

    public function handle(ActionRequest $request)
    {
        if ($request->hasFile('logo_fr')) {
            $logo_fr_path = $this->storeAndOptimizeImage($request, 'logo_fr', 'vendor_images');
            $path_ar= $path_fr = 'storage/vendor_images/' . $logo_fr_path;
        }





       $vendor= Vendor::query()->create($this->getVendorFields($request)+['is_active'=>true,'logo_fr'=>$path_fr,'logo_ar'=>$path_ar]);
       $user= $vendor->vendors()->create([
           'phone'=>$request->phone,
           'email'=>$request->email,
           'password'=>Hash::make($request->password),
           'is_active'=>true
        ]);
        $user->roles()->sync(2);
        $vendor->images()->create([
            'name'=> 'banner'
        ]);
        $vendor->images()->create([
          'name'=> 'side bar banner'
        ]);




    }

    private function getVendorFields($request): array
    {
        return $request->only([
            'name_ar',
            'name_fr',
//            'is_active',

            'short_dec_fr',
            'short_dec_ar',
//
//            'desc_fr',
//            'desc_ar',

        ]);
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
            'name_fr' => 'required|string|max:45|unique:vendors,name_fr',
            'name_ar' => 'required|string|max:45|unique:vendors,name_ar',

            'short_dec_fr' => 'required|string|max:191',
            'short_dec_ar' => 'required|string|max:191',

            'desc_fr' => 'nullable|sometimes|string|max:191',
            'desc_ar' => 'nullable|sometimes|string|max:191',

            'logo_fr' => 'required|max:2048|mimes:jpeg,png,jpg',

            'phone'=>['required','unique:vendor_users', new PhoneNumber()],
            'email'=>'required|email|unique:vendor_users|unique:users',
            'password'=>'required|min:8|confirmed',
//            'is_active'=>'required|in:0,1',

//            'roles'=>['required','array'],
//            'roles.*'=>['exists:roles,id']
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'name_ar' => 'nom en ar',
            'name_fr' => 'nom en fr',
            'phone'=>'téléphone',
            'password'=>'mot de passe',
            'password_confirmation'=>'confirmation de mot de passe'
        ];
    }

}
