<?php

namespace App\Modules\VendorsLogic\Controllers\products;

use App\Models\Vendor;
use App\Modules\ProductsLogic\Models\Product;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreProductVendor
{
    use AsAction, UploadImageTrait;

    public function asController(ActionRequest $request, Vendor $vendor)
    {

        $product = $this->handle($request, $vendor);

        $product->categories()->sync($request->categories);
        $product->brands()->sync($request->brands);

        Session::flash('success', 'Produit ajouté avec succès.');
        return redirect()->route('admin.vendors.detail',['vendor'=>$vendor->id,'type'=>'all','#Products']);
    }

    public function handle(ActionRequest $request, $vendor): Product
    {
        $rand_f = rand(3, 4);
        $rand_b = 1 / rand(1, 2);
        $random_rat = $rand_f + $rand_b;
        $path = null;

        if ($request->hasFile('image')) {

            $image_path = $this->storeAndOptimizeImage($request, 'image', 'product_images');
            $path = 'storage/product_images/' . $image_path;

        }
        return Product::create($this->getProductFields($request) + ['is_active'=>true,'vendor_id' => $vendor->id, 'image' => $path, 'rating' => $random_rat]);


    }

    private function getProductFields($request): array
    {
        return $request->only([
            'name_fr',
            'name_ar',
            'desc_ar',
            'desc_fr',
            'discount',
            'price_old',
            'price',
            /* 'image', */
            'ref',
            'slug',
//            'is_active',
            'shipping'
        ]);
    }

    public function rules(): array
    {
        return [
            'name_fr' => 'required|string|max:300|unique:products,name_fr',
            'name_ar' => 'required|string|max:300|unique:products,name_ar',
            'desc_ar' => 'nullable|string|max:65000',
            'desc_fr' => 'nullable|string|max:65000',
            'ref' => 'required|string|max:191',
//            'price_old' => 'required|min:0|numeric',
            'price' => 'required|min:0|numeric',
            'shipping' => 'nullable|min:0|numeric',
//            'discount' => 'required|numeric|min:0|max:100',
            'image' => 'nullable|max:2048|mimes:jpeg,png,jpg',
            'categories' => 'nullable|array',
            'brands' => 'nullable|array',
//            'is_active' => 'required|in:0,1',
            'slug' => 'required|string|max:300|unique:products,slug',
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'name_ar' => 'nom en arabe',
            'name_fr' => 'nom en français',
            'desc_ar' => 'description en arabe',
            'desc_fr' => 'description en français',
            'ref' => 'référence',
            'price_old' => 'ancien prix',
            'price' => 'prix',
            'discount' => 'remise',
            'categories' => 'catégories',
            'brands' => 'marques',
            'shipping' => 'Transport',
        ];
    }

}
