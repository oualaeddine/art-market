<?php

namespace App\Modules\WebsiteLogic\Controllers\Auth;

use App\Modules\ClientsLogic\Models\Client;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ResetPassword
{
    use AsAction;

    public function asController(ActionRequest $request)
    {
        $method = $this->handle($request);
        if ($method === false) {
            Toastr::error(trans('Invalid token!'), '', ["positionClass" => "toast-bottom-right"]);

            return back()->withInput();
        }
        Toastr::success(trans('Your password has been changed!'), '', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('client.login');

    }

    public function handle($request)
    {
        $updatePassword = DB::table('client_password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
//                'code'=>$request->code
            ])
            ->first();

        if (!$updatePassword) return false;


        Client::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('client_password_resets')->where(['email' => $request->email])->delete();
        return true;
    }

    public function rules(): array
    {

        return [
            'email' => 'required|exists:clients',
//            'code' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ];

    }

    public function getValidationAttributes(): array
    {
        return [
            'phone' => trans('Phone'),
            'password'=>trans('Password'),
            'password_confirmation'=>trans('Password confirmation')
        ];
    }

}
