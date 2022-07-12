<?php

namespace App\Modules\WebsiteLogic\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class LogoutAction
{
    use AsAction;

    public function handle(Request $request)
    {
        if(Auth::guard('client')->user()){

            Auth::guard('client')->logout();

//            $request->session()->invalidate();

            $request->session()->regenerateToken();

        }

        return redirect()->back();
    }
}
