<?php

namespace App\Modules\WebsiteLogic\Controllers\Cart;

use App\Modules\ProductsLogic\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class DestroyCart
{
    use AsAction;


    public function handle(ActionRequest $request,Product $product)
    {
        Cart::destroy();
    }



}
