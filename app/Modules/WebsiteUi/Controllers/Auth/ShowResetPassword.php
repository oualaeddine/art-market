<?php

namespace App\Modules\WebsiteUi\Controllers\Auth;

use App\Helpers\SetLocal;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowResetPassword
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController($token)
    {
        $lang = Session::get('client_lang');

        if($lang){
            SetLocal::generate('ar');
        }
        

        return view('WebsiteUi::auth.reset-password',['token'=>$token])->with(['page_title' => 'Reset Password']);
    }

}
