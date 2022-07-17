<?php

namespace App\Modules\WebsiteUi\Controllers\Auth;

use App\Helpers\SetLocal;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowForgetPassword
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {
        return view('WebsiteUi::forgot-password')->with(['page_title' => trans('Forget Password')]);
    }

}
