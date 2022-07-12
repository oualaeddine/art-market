<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\images;


use App\Models\Vendor;
use App\Models\VendorUser;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreImage
{
    use AsAction, UploadImageTrait;

    public function asController(ActionRequest $request)
    {
        $this->handle($request);
        Session::flash('success', 'Image ajouté avec succès.');
        return redirect()->back();
    }

    public function handle(ActionRequest $request)
    {


        if ($request->hasFile('image_ar')) {
            $logo_fr_path = $this->storeAndOptimizeImage($request, 'image_ar', 'vendor_images');
            $path_fr = 'storage/vendor_images/' . $logo_fr_path;
        }

        if ($request->hasFile('image_fr')){
            $logo_ar_path = $this->storeAndOptimizeImage($request, 'image_fr', 'vendor_images');
            $path_ar = 'storage/vendor_images/' . $logo_ar_path;
        }

        auth()->guard('vendor')->user()->vendor()->first()->images()->create([
            'img_ar'=>$path_ar,
            'img_fr'=>$path_fr,
        ]);


    }


    public function rules(): array
    {
        return [
            'image_ar' => 'required|max:2048|mimes:jpeg,png,jpg',
            'image_fr' => 'required|max:2048|mimes:jpeg,png,jpg',
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
