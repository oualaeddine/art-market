<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\products;



use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class ToggleProduct
{
    use AsAction;

    public function asController(Product $product)
    {

        $product->update([
           'is_active'=>!$product->is_active
        ]);
        Session::flash('success', 'Produit mis à jour avec succès.');
        return redirect()->back();
    }


}
