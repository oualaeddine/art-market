<?php

namespace App\Modules\VendorsLogic\Controllers\products;


use App\Modules\ProductsLogic\Models\Product;
use App\Modules\ProductsLogic\Models\Product_image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteProductVendor
{
    use AsAction;

    public function asController(Product $product)
    {
        $product_orders =  Product::where('id',$product->id)->wherehas('orderProduct.order',function($q){
                                            $q->whereIn('status',['pending','confirmed']);
                            })->first();

        if($product_orders != null){
            Session::flash('error', "le produit contient des commandes, supprimez d'abord les commandes ");
            return redirect()->back();
        }
        $vendor_id=$product->vendor_id;
        $this->handle($product);

        Session::flash('success', 'Produit supprimé avec succès.');
        return redirect()->route('admin.vendors.detail',['vendor'=>$vendor_id,'type'=>'all','#Products']);
    }

    public function handle($product): void
    {

        if($product->image != null){
            File::delete(public_path($product->image));
        }

        if($product->images->isNotEmpty()){

            foreach($product->images as $p){

                File::delete(public_path($p->image));

                Product_image::find($p->id)->delete();

            }

        }

        $product->delete();
    }


}
