<?php

namespace App\Modules\VendorsLogic\Controllers\products;


use App\Modules\ProductsLogic\Models\Product;
use App\Modules\ProductsLogic\Models\Product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteImageVendor
{
    use AsAction;

    public function asController(Request $request,$id)
    {
        $vendor_id=$this->handle($request,$id);
        Session::flash('success', 'Image de produit supprimé avec succès.');
        return redirect()->route('admin.vendors.detail',['vendor'=>$vendor_id,'type'=>'all','#Products']);

    }

    public function handle(Request $request,$id)
    {
        if($request->type == 'main'){

            $product_image = Product::findorfail($id);

            File::delete(public_path($product_image->image));

            $product_image->image = null;
            $product_image->save();

            return $product_image->vendor_id;

        }else{

            $product_image = Product_image::findorfail($id);
            $vendor_id= $product_image->product->vendor_id;

            File::delete(public_path($product_image->image));

            $product_image->delete();
            return$vendor_id;
        }

    }


}
