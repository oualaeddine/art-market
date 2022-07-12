<?php

namespace App\Modules\WebsiteLogic\Controllers\Auth;

use App\Modules\ClientsLogic\Models\Client;
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
            return back()->withInput()->with('error', 'Invalid token!');
        }
        return redirect()->route('client.login')->with('message', 'Your password has been changed!');

    }

    public function handle($request)
    {
        $updatePassword = DB::table('client_password_resets')
            ->where([
                'phone' => $request->phone,
                'token' => $request->token,
                'code'=>$request->code
            ])
            ->first();

        if (!$updatePassword) {
            return false;
        }

        Client::where('phone', $request->phone)->update(['password' => Hash::make($request->password)]);

        DB::table('client_password_resets')->where(['phone' => $request->phone])->delete();
        return true;
    }

    public function rules(): array
    {

        return [
            'phone' => 'required|exists:clients',
            'code' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ];

    }

    public function getValidationAttributes(): array
    {
        return [
            'phone' => 'Téléphone',
            'password'=>'mot de passe',
            'password_confirmation'=>'confirmation mot de passe'
        ];
    }

}
