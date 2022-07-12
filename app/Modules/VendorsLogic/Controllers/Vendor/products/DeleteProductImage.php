<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\products;


use App\Modules\ProductsLogic\Models\Product;
use App\Modules\ProductsLogic\Models\Product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteProductImage
{
    use AsAction;

    public function asController(Request $request,$id)
    {
        $this->handle($request,$id);
        Session::flash('success', 'Image de Produit supprimé avec succès.');
        return redirect()->back();
    }

    public function handle(Request $request,$id): void
    {
        if($request->type == 'main'){

            $product_image = Product::findorfail($id);

            File::delete(public_path($product_image->image));

            $product_image->image = null;
            $product_image->save();

        }else{

            $product_image = Product_image::findorfail($id);

            File::delete(public_path($product_image->image));

            $product_image->delete();
        }

    }


}
