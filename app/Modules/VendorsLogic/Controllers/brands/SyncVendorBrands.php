<?php

namespace App\Modules\VendorsLogic\Controllers\brands;

use App\Models\Vendor;
use App\Models\VendorUser;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SyncVendorBrands
{
    use AsAction, UploadImageTrait;

    public function asController(ActionRequest $request,Vendor $vendor)
    {
        $this->handle($request,$vendor);
        Session::flash('success', 'Marque ajouté avec succès.');

        return redirect()->route('admin.vendors.detail',['vendor'=>$vendor->id,'type'=>'all','#Brands']);
    }

    public function handle(ActionRequest $request,$vendor)
    {
        $vendor->brands()->sync($request->brands);
    }


    public function rules(): array
    {
        return [
            'brands' => ['nullable','array'],
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
