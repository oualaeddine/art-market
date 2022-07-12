<?php

namespace App\Modules\VendorsLogic\Controllers\brands;

use App\Models\Vendor;
use App\Models\VendorBrand;
use App\Models\VendorCategory;
use App\Models\VendorUser;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ToggleVendorBrands
{
    use AsAction, UploadImageTrait;

    public function asController(ActionRequest $request,VendorBrand $brand)
    {
        $this->handle($request,$brand);
        Session::flash('success', 'Marque mis à jour  ajouté avec succès.');

        return redirect()->route('admin.vendors.detail',['vendor'=>$brand->vendor_id,'type'=>'all','#Brands']);
    }

    public function handle(ActionRequest $request,$brand)
    {
        $brand->update([
           'is_active'=>!$brand->is_active
        ]);
    }




}
