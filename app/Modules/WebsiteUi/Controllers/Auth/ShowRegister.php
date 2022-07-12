<?php

namespace App\Modules\WebsiteUi\Controllers\Auth;

use App\Helpers\SetLocal;
use App\Models\YalidineWilaya;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowRegister
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
        

        if(Auth::guard('client')->user()){
            return redirect()->route('client.account');
        }

        return view('WebsiteUi::auth.register',['wilayas'=>YalidineWilaya::all()])->with(['page_title' => 'Register']);
    }

}
