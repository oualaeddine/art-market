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

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {
        $lang = Session::get('client_lang');

        if($lang){
            SetLocal::generate('ar');
        }
        

        $cart = Cart::content();

        $sub_total = 0;

        foreach($cart as $c){

            $sub_total = $sub_total + $c->options->price_old * $c->qty; 
        };


        return view('WebsiteUi::cart',compact('cart','sub_total'))->with(['page_title' => 'Cart']);
    }

}
