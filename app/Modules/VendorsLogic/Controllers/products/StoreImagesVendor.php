<?php

namespace App\Modules\VendorsLogic\Controllers\products;


use App\Modules\ProductsLogic\Models\Product;
use App\Modules\ProductsLogic\Models\Product_image;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreImagesVendor
{
    use AsAction,UploadImageTrait;

    public function asController(ActionRequest $request,Product $product)
    {

         $this->handle($request,$product);

        Session::flash('success', 'Image de produit ajouté avec succès.');
        return redirect()->route('admin.vendors.detail',['vendor'=>$product->vendor_id,'type'=>'all','#Products']);
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
