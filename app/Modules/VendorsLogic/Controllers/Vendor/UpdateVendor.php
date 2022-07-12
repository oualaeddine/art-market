<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor;

use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateVendor
{
    use AsAction, UploadImageTrait;

    public function asController(ActionRequest $request)
    {
        $this->handle($request);
        Session::flash('success', 'Vendeur mis à jour avec succès.');
        return redirect()->route('vendor.profile');
    }

    public function handle(ActionRequest $request)
    {
        $vendor=\auth()->guard('vendor')->user()->vendor;
        $path_fr=$vendor->logo_fr;
        $path_ar=$vendor->logo_ar;
        if ($request->hasFile('logo_fr')) {
            $logo_fr_path = $this->storeAndOptimizeImage($request, 'logo_fr', 'vendor_images');
            $path_ar=  $path_fr = 'storage/vendor_images/' . $logo_fr_path;
        }

        $vendor->update($this->getVendorFields($request)+['logo_fr'=>$path_fr,'logo_ar'=>$path_ar]);
    }

    private function getVendorFields($request): array
    {
        return $request->only([
            'name_ar',
            'name_fr',

            'short_dec_fr',
            'short_dec_ar',

//            'desc_fr',
//            'desc_ar',
            'is_active'
        ]);
    }

    public function rules(): array
    {
        return [
            'name_fr' => 'required|string|max:45|unique:vendors,name_fr,'.\auth()->guard('vendor')->user()->vendor_id,
            'name_ar' => 'required|string|max:45|unique:vendors,name_ar,'.\auth()->guard('vendor')->user()->vendor_id,

            'short_dec_fr' => 'required|string|max:191',
            'short_dec_ar' => 'required|string|max:191',

//            'desc_fr' => 'required|string|max:191',
//            'desc_ar' => 'required|string|max:191',
            'is_active'=>'required|in:0,1',

            'logo_fr' => 'nullable|sometimes|max:2048|mimes:jpeg,png,jpg',

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
