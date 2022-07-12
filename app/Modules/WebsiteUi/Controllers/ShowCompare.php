<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowCompare
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
        

        return view('WebsiteUi::compare')->with(['page_title' => 'Compare']);
    }

}
