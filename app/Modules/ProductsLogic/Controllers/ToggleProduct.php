<?php

namespace App\Modules\ProductsLogic\Controllers;

use App\Modules\ProductsLogic\Models\Product;
use App\Modules\ProductsLogic\Models\Product_image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class ToggleProduct
{
    use AsAction;

    public function asController(Product $product)
    {

        $this->handle($product);
        Session::flash('success', 'Produit mis à jour avec succès.');
        return redirect()->back();
    }

    public function handle($product): void
    {
        $product->update([
           'is_active'=>!$product->is_active
        ]);
    }


}
