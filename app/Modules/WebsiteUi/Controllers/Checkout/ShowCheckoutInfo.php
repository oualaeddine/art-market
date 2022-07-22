<?php

namespace App\Modules\WebsiteUi\Controllers\Checkout;

use App\Helpers\SetLocal;
use App\Models\YalidineMairie;
use App\Models\YalidineWilaya;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowCheckoutInfo
{

    use AsAction;

    private function checkCart(){
        return Cart::count() != 0;
    }
    public function asController(ActionRequest $request)
    {

        if(!$this->checkCart()) return redirect()->route('shop');

        $client = Auth::guard('client')->user();

        $wilayas = YalidineWilaya::get();
        $communes=YalidineMairie::query()->get();

        $cart=Cart::content();
        $shipping = number_format($cart->sum(function ($item) {return $item->qty * $item->options->shipping;}), 2);
        $sub_total=$cart->sum(function ($item) {return $item->qty * $item->price;});
        $total = number_format(($shipping+$sub_total), 2);

        return view('WebsiteUi::checkout',compact('communes','wilayas','client','shipping','total'))->with(['page_title' => trans('Checkout information')]);
    }

}
