<?php

namespace App\Modules\WebsiteLogic\Controllers\Products;

use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetProducts
{
    use AsAction;


    public function handle(ActionRequest $request)
    {
        return $products = Product::get();
    }

}
