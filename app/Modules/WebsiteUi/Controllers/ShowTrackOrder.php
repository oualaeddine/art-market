<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowTrackOrder
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
        

        return view('WebsiteUi::order-track')->with(['page_title' => 'Order Tracking']);
    }

}
