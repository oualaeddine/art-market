<?php

namespace App\Modules\WebsiteUi\Controllers\Auth;

use App\Helpers\SetLocal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowLogin
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {

        if(Auth::guard('client')->user()){
            return redirect()->route('client.account');
        }
        return view('WebsiteUi::login')->with(['page_title' => trans('Login')]);
    }

}
