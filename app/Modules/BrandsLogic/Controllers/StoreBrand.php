<?php

namespace App\Modules\BrandsLogic\Controllers;

use App\Modules\BrandsLogic\Models\Brand;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreBrand
{
    use AsAction,UploadImageTrait;

    public function asController(ActionRequest $request)
    {
        $this->handle($request);
        Session::flash('success', 'Marque ajouté avec succès.');
        return redirect()->back();
    }

    public function handle(ActionRequest $request): Brand
    {
        if ($request->image != null) {

            $image_path = $this->storeAndOptimizeImage($request, 'image', 'brands_images');
            $path = 'storage/brands_images/' . $image_path;

            return Brand::create($this->getBrandFields($request) + ['image' => $path]);
          
        } else {
            return Brand::create($this->getBrandFields($request));
        }

     
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
            'name_ar' => 'required|string|max:45|unique:brands,name_ar',
            'name_fr' => 'required|string|max:45|unique:brands,name_fr',
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
