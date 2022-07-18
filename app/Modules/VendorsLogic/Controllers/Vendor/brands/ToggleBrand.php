<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\brands;

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

class ToggleBrand
{
    use AsAction;

    public function asController(ActionRequest $request,VendorBrand $brand)
    {
        $this->handle($request,$brand);
        Session::flash('success', 'Marque mis à jour avec succès.');

        return redirect()->route('vendor.brands.index');
    }

    public function handle(ActionRequest $request,$brand)
    {
        $brand->update([
           'is_active'=>!$brand->is_active
        ]);
    }




}
