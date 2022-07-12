<?php

namespace App\Modules\WebsiteLogic\Controllers\Auth;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class LoginAction
{
    use AsAction;

        //->middleware('auth:client');
    public function handle(ActionRequest $request)
    {
        if(Auth::guard('client')->attempt(['phone'=>$request->phone,'password'=>$request->password],$request->remember_me))
        {
            $this->checkCart();
            Session::flash('message',Session::get('client_lang')?'تسجيل الدخول بنجاح':'Authentification avec succes');
//            $intended=Session::get('intended')??'index';
//            Session::forget('intended');
            return redirect()->route('index');
        }


        return redirect()->back()
            ->withInput([
                'phone'=>$request->phone
            ])
            ->with('error', Session::get('client_lang')?'بيانات الاعتماد غير صالحة':'Les informations d\'identification invalides');
    }

    private function checkCart()
    {
        $phone=auth()->guard('client')->user()->phone;
        Cart::restore($phone);
        Cart::store($phone);

    }
    public function prepareForValidation(ActionRequest $request): void
    {
        $request->merge(['phone' => $this->getPhoneNumberClean($request->phone)]);
    }

    private function getPhoneNumberClean($phone)
    {
        if (Str::startsWith($phone, '00213')) return explode('00213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0213')) return explode('0213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '+213')) return explode('+213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '213')) return explode('213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0')) return explode('0', $phone, 2)[1];
        elseif (Str::startsWith($phone, '6') || Str::startsWith($phone, '5') || Str::startsWith($phone, '7')) return $phone;
        else return 0;
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
            'phone' => 'Téléphone',
            'password' => 'mot de passe',
        ];
    }

    public function getValidationMessages(): array
    {
        return [
            'phone.exists' => Session::get('client_lang')?'حقل الهاتف المحدد غير صالح':'Le champ Téléphone sélectionné est invalide.',
        ];
    }


}
