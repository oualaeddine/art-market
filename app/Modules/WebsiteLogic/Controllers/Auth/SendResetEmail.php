<?php

namespace App\Modules\WebsiteLogic\Controllers\Auth;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SendResetEmail
{
    use AsAction;

    public function asController(ActionRequest $request)
    {
        $this->handle($request);
        Toastr::success(trans('Email sent successfully'), '', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();

    }

    public function handle($request)
    {

        $token = Str::random(64);
//        $code = Str::random(6);

        DB::table('client_password_resets')->updateOrInsert( ['email'=>$request->email],[
            'token' => $token,
//            'code' => $code,
            'created_at' => Carbon::now()
        ]);

        Mail::send('WebsiteUi::email.forgot-password', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject(trans('Reset Password'));
        });

    }

    public function rules(): array
    {

        return [
            'email' => ['required', 'exists:clients'],
        ];

    }

    public function getValidationMessages(): array
    {
        return [
            'email.exists' => trans('Invalid email'),
        ];
    }


}
