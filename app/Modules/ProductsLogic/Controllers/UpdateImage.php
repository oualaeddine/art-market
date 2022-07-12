<?php

namespace App\Modules\ProductsLogic\Controllers;

use App\Modules\ProductsLogic\Models\Product;
use App\Modules\ProductsLogic\Models\Product_image;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateImage
{
    use AsAction,UploadImageTrait;

    public function asController(Request $request,$id)
    {
        $this->handle($request,$id);
        Session::flash('success', 'Image de Produit mis a jour avec succès.');
        return redirect()->back();
    }

    public function handle(Request $request,$id): void
    {
        if($request->type == 'main'){

            $product_image = Product::findorfail($id);

            File::delete(public_path($product_image->image));

            $image_path = $this->storeAndOptimizeImage($request, 'image', 'product_images');
            $path = 'storage/product_images/' . $image_path;

            $product_image->image = $path;
            $product_image->save();

        }else{

            $product_image = Product_image::findorfail($id);

            File::delete(public_path($product_image->image));

            $image_path = $this->storeAndOptimizeImage($request, 'image', 'product_images');
            $path = 'storage/product_images/' . $image_path;

            $product_image->image = $path;
            $product_image->save();
        }

    }

    public function rules(): array
    {
        return [

            'image' => ['required','image','max:2048','mimes:png,jpg,jpeg'],
        ];
    }


}
