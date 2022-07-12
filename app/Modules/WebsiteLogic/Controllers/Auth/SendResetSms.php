<?php

namespace App\Modules\WebsiteLogic\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SendResetSms
{
    use AsAction;

    public function asController(ActionRequest $request)
    {
        $this->handle($request);
        return back()->with('message', 'We have sms\'ed your password reset link!');

    }

    public function handle($request)
    {

        $token = Str::random(64);
        $code = Str::random(6);

        DB::table('client_password_resets')->updateOrInsert( ['phone'=>$request->phone],[
            'token' => $token,
            'code' => $code,
            'created_at' => Carbon::now()
        ]);

//        Mail::send('WebsiteUi::email.forgetPassword', ['token' => $token], function($message) use($request){
//            $message->to($request->email);
//            $message->subject('Reset Password');
//        });

    }

    public function rules(): array
    {

        return [
            'phone' => ['required', 'exists:clients'],
        ];

    }

    public function getValidationAttributes(): array
    {
        return [
            'phone' => 'Téléphone',
        ];
    }

}
