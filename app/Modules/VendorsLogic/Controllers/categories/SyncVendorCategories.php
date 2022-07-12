<?php

namespace App\Modules\VendorsLogic\Controllers\categories;

use App\Models\Vendor;
use App\Models\VendorUser;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SyncVendorCategories
{
    use AsAction, UploadImageTrait;

    public function asController(ActionRequest $request,Vendor $vendor)
    {
        $this->handle($request,$vendor);
        Session::flash('success', 'Catégorie ajouté avec succès.');

        return redirect()->route('admin.vendors.detail',['vendor'=>$vendor->id,'type'=>'all','#Categories']);
    }

    public function handle(ActionRequest $request,$vendor)
    {
        $vendor->categories()->sync($request->categories);
    }


    public function rules(): array
    {
        return [
            'categories' => ['nullable','array'],
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
