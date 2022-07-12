<?php

namespace App\Modules\ProductsLogic\Controllers;

use App\Modules\ProductsLogic\Models\Product;
use App\Modules\ProductsLogic\Models\Product_image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class RestoreProduct
{
    use AsAction;

    public function asController(Product $product)
    {


        $this->handle($product);
        Session::flash('success', 'Produit restaurer avec succès.');
        return redirect()->back();
    }

    public function handle($product): void
    {


        $product->restore();
    }


}
