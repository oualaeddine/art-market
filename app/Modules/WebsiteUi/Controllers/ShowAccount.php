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

        $client = Auth::guard('client')->user();
        $client->load('addresses');
        $client->load('orders.orderProducts');
        $client->loadCount('orders');
        $wilayas = YalidineWilaya::get();
        $tab=$request->tab??'account';
        return view('WebsiteUi::account',compact('tab','client','wilayas'))->with(['page_title' => trans('Account')]);
    }

}
