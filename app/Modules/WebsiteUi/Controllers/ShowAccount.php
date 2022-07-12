<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowAccount
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


        $client = Auth::guard('client')->user();
        $client->load('addresses');
        $client_orders = Client::where('id',$client->id)->with('orders.orderProducts')->with('coupons')->first();

        $wilayas = YalidineWilaya::get();
        $communes=DB::table('yalidine_mairies')->get();

        return view('WebsiteUi::account',compact('communes','client','client_orders','wilayas'))->with(['page_title' => 'Account']);
    }

}
