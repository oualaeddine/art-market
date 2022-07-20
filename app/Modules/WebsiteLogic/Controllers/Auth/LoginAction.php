<?php

namespace App\Modules\WebsiteLogic\Controllers\Auth;

use App\Helpers\GetCleanPhoneNumber;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class LoginAction
{
    use AsAction;

    public function handle(ActionRequest $request)
    {
        if (!$this->checkCred($request)){
            Toastr::error(trans('Invalid credentials'), '', ["positionClass" => "toast-bottom-right"]);
            return redirect()->back()->withInput(['phone' => '0' . $request->phone]);
        }


        Toastr::success(trans('Logged in successfully'), '', ["positionClass" => "toast-bottom-right"]);

        if ($request->from=='checkout')
            return redirect()->route('checkout');


        return redirect()->route('client.account');


    }

    private function checkCred($request)
    {
        return Auth::guard('client')->attempt(['phone' => $request->phone, 'password' => $request->password], true);
    }

    public function prepareForValidation(ActionRequest $request): void
    {
        $request->merge(['phone' => (new GetCleanPhoneNumber)->getPhone($request->phone)]);
    }

    public function rules(): array
    {

        return [
            'phone' => ['required', 'exists:clients,phone'],
            'password' => Password::min(8)->required(),
        ];

    }

    public function getValidationAttributes(): array
    {
        return [
            'phone' => trans('PhoneNumber'),
            'password' => trans('Password'),
        ];
    }

    public function getValidationMessages(): array
    {
        return [
            'phone.exists' => trans('Invalid credentials'),
        ];
    }

    private function checkCart()
    {
        $phone = auth()->guard('client')->user()->phone;
        Cart::restore($phone);
        Cart::store($phone);

    }


}
