<?php

namespace App\Modules\WebsiteLogic\Controllers\Help;

use App\Modules\ClientsLogic\Models\Contact;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SetLang
{
    use AsAction;

    public function handle(ActionRequest $request)
    {
       
    }

    public function asController(ActionRequest $request)
    {
        if($request->lang == 'ar'){
            $request->session()->put('client_lang',$request->lang);
        }else{
            $request->session()->forget('client_lang');
        }
    }
}
