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


        if(Cart::count() == 0){

            return redirect()->route('shop');

        }

        $client = Auth::guard('client')->user();


        $wilayas = YalidineWilaya::get();
        $communes=YalidineMairie::query()->get();

        return view('WebsiteUi::checkout.info',compact('communes','wilayas','client'))->with(['page_title' => 'Checkout | Info']);
    }

}
