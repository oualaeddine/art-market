<?php

namespace App\Modules\BrandsLogic\Controllers;

use App\Modules\BrandsLogic\Models\Brand;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateBrand
{
    use AsAction,UploadImageTrait;

    public function asController(ActionRequest $request, Brand $brand)
    {
        $this->handle($request, $brand);
        Session::flash('success', 'Marque mis à jour avec succès.');
        return redirect()->back();
    }

    public function handle(ActionRequest $request, Brand $brand): void
    {
        if ($request->image != null) {

            $image_path = $this->storeAndOptimizeImage($request, 'image', 'brands_images');
            $path = 'storage/brands_images/' . $image_path;

            if($brand->image != null){
                File::delete(public_path($brand->image));
            }

            $brand->update(['image' => $path]);
        }


        $brand->update($this->getBrandFields($request));
    }

    private function getBrandFields($request): array
    {
        return $request->only([
            'name_ar',
            'name_fr',
        ]);
    }

    public function rules(): array
    {
        return [
            'name_ar' => 'required|string|max:45|'.Rule::unique('brands', 'name_ar')->ignore(request()->brand->id),
            'name_fr' => 'required|string|max:45|'.Rule::unique('brands', 'name_fr')->ignore(request()->brand->id),
            'image' => 'nullable|max:2048|mimes:jpeg,png,jpg',
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
