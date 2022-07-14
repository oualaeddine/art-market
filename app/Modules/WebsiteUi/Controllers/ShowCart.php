<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowCart
{

    use AsAction;

    public function asController()
    {

        $cart = Cart::content();

        return view('WebsiteUi::cart',compact('cart'))->with(['page_title' => trans('Cart')]);
    }

}
