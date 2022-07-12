<?php

namespace App\Modules\VendorsLogic\Controllers\products;


use App\Modules\ProductsLogic\Models\Product;
use App\Modules\ProductsLogic\Models\Product_image;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateImageVendor
{
    use AsAction, UploadImageTrait;

    public function asController(Request $request, $id)
    {
        $vendor_id = $this->handle($request, $id);
        Session::flash('success', 'Image de produit mis a jour avec succès.');
        return redirect()->route('admin.vendors.detail', ['vendor' => $vendor_id, 'type' => 'all', '#Products']);

    }

    public function handle(Request $request, $id)
    {
        if ($request->type == 'main') {

            $product_image = Product::findorfail($id);

            File::delete(public_path($product_image->image));

            $image_path = $this->storeAndOptimizeImage($request, 'image', 'product_images');
            $path = 'storage/product_images/' . $image_path;

            $product_image->image = $path;
            $product_image->save();
            return $product_image->vendor_id;
        } else {

            $product_image = Product_image::findorfail($id);

            File::delete(public_path($product_image->image));

            $image_path = $this->storeAndOptimizeImage($request, 'image', 'product_images');
            $path = 'storage/product_images/' . $image_path;

            $product_image->image = $path;
            $product_image->save();
            return $product_image->product->vendor_id;
        }

    }


}
