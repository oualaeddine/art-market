<?php

namespace App\Modules\WebsiteUi\Controllers\Auth;

use App\Helpers\SetLocal;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowResetPasswordForm
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
        

        return view('WebsiteUi::auth.forget-password')->with(['page_title' => 'Forget Password']);
    }

}
