<?php

namespace App\Modules\VendorsLogic\Controllers\categories;

use App\Models\Vendor;
use App\Models\VendorCategory;
use App\Models\VendorUser;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ToggleVendorCategories
{
    use AsAction, UploadImageTrait;

    public function asController(ActionRequest $request,VendorCategory $category)
    {
        $this->handle($request,$category);
        Session::flash('success', 'Catégorie mis à jour  ajouté avec succès.');

        return redirect()->route('admin.vendors.detail',['vendor'=>$category->vendor_id,'type'=>'all','#Categories']);
    }

    public function handle(ActionRequest $request,$category)
    {
        $category->update([
           'is_active'=>!$category->is_active
        ]);
    }




}
