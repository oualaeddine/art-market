<?php

namespace App\Modules\ProductsLogic\Controllers;

use App\Modules\ProductsLogic\Models\Product;
use App\Modules\ProductsLogic\Models\Product_image;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreImages
{
    use AsAction,UploadImageTrait;

    public function asController(ActionRequest $request,Product $product)
    {
        $product = $this->handle($request,$product);

        Session::flash('success', 'Image de produit ajouté avec succès.');
        return redirect()->back();
    }

    public function handle(ActionRequest $request,Product $product)
    {

        $image_path = $this->storeAndOptimizeImage($request, 'image', 'product_images');
        $path = 'storage/product_images/' . $image_path;

        if($product->image == null){

            $product->update(['image' => $path]);

        }else{
            return  $product = Product_image::create(['image' => $path , 'product_id' => $product->id]);
        }
      
    }

    public function rules(): array
    {
        return [
            'image' => 'required|max:2048|mimes:jpeg,png,jpg',
        ];
    }


}
