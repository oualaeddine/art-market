<?php

namespace App\Modules\WebsiteLogic\Controllers\Products;

use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetProductDetails
{
    use AsAction;


    public function handle(ActionRequest $request,Product $product)
    {
        return $product;
    }

}
