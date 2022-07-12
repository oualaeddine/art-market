<?php

namespace App\Modules\WebsiteLogic\Controllers\CheckOut;

use App\Models\User;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\ProductsLogic\Models\Product;
use App\Modules\WebsiteLogic\Controllers\Cart\AddCart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class CheckoutProduct
{
    use AsAction;


    public function handle(ActionRequest $request,Product $product)
    {
        
    }

    public function asController(ActionRequest $request,Product $product)
    {
        
        AddCart::run($request,$product);
        /* Session::flash('message', 'Checkout avec succés'); */
        return redirect()->route('cart');

    }


    public function rules(): array
    {
        return [
            'qty' => ['required'],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'qty' => 'quantité',
        ];
    }


}
