<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\categories;

use App\Models\Vendor;
use App\Models\VendorUser;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SyncCategories
{
    use AsAction, UploadImageTrait;

    public function asController(ActionRequest $request)
    {
        $this->handle($request);
        Session::flash('success', 'Catégories ajouté avec succès.');

        return redirect()->route('vendor.categories.index');
    }

    public function handle(ActionRequest $request)
    {
        auth()->guard('vendor')->user()->vendor()->first()->categories()->sync($request->categories);
    }


    public function rules(): array
    {
        return [
            'categories' => ['required','array'],
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
