<?php

namespace App\Modules\VendorsLogic\Controllers\products;


use App\Modules\ProductsLogic\Models\Product;
use App\Modules\ProductsLogic\Models\Product_image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class ToggleProductVendor
{
    use AsAction;

    public function asController(Product $product)
    {
        $product->update([
            'is_active'=>!$product->is_active
        ]);
        Session::flash('success', 'Produit mis à jour avec succès.');
        return redirect()->route('admin.vendors.detail',['vendor'=>$product->vendor_id,'type'=>'all','#Products']);
    }




}
