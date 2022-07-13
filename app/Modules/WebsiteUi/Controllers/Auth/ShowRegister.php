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


    public function asController(ActionRequest $request)
    {

        if(Auth::guard('client')->user()){
            return redirect()->route('client.account');
        }

        return view('WebsiteUi::register',['wilayas'=>YalidineWilaya::all()])->with(['page_title' => trans('Register')]);
    }

}
