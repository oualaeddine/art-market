<?php

namespace App\Modules\ProductsLogic\Controllers;

use App\Modules\ProductsLogic\Models\Product;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateProduct
{
    use AsAction,UploadImageTrait;

    public function asController(ActionRequest $request,Product $product)
    {
        $this->handle($request,$product);
        Session::flash('success', 'Produit mis à jour avec succès.');
        return redirect()->route('admin.products.index');
    }


    public function handle(ActionRequest $request,Product $product)
    {

        if ($request->image != null) {

            $image_path = $this->storeAndOptimizeImage($request, 'image', 'product_images');
            $path = 'storage/product_images/' . $image_path;

            if($product->image != null){
                File::delete(public_path($product->image));
            }

            $product->update(['image' => $path]);
        }


        $product->update($this->getProductFields($request));

        $product->categories()->sync($request->categories);
        $product->brands()->sync($request->brands);

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
            'is_active',
            'shipping'
        ]);
    }

    public function rules(Product $product): array
    {
        return [
            'name_fr' => 'required|string|max:300|unique:products,name_fr,'.request()->product->id,
            'name_ar' => 'required|string|max:300|unique:products,name_ar,'.request()->product->id,
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
            'is_active' => 'required|in:0,1',
            'slug' => 'required|string|max:300|unique:products,slug,'.request()->product->id,
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
