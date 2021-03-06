<?php

namespace App\Modules\WebsiteUi\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowCart
{

    use AsAction;

    public function asController()
    {

        $cart = Cart::content();
        $shipping = $cart->sum(function ($item) {return $item->qty * $item->options->shipping;});
        $sub_total=$cart->sum(function ($item) {return $item->qty * $item->price;});
        $total = number_format((($shipping??0)+$sub_total), 2);
        return view('WebsiteUi::cart', compact('cart','shipping','total'))->with(['page_title' => trans('Cart')]);
    }

}
