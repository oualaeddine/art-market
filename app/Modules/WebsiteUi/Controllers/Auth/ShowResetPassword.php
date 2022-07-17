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
        return view('WebsiteUi::reset-password',['token'=>$token])->with(['page_title' => trans('Reset Password')]);
    }

}
