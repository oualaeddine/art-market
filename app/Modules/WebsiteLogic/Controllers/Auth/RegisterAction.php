<?php

namespace App\Modules\WebsiteLogic\Controllers\Auth;

use App\Models\YalidineMairie;
use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\Client_wallet;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class RegisterAction
{
    use AsAction;

        //->middleware('auth:client');
    public function handle(ActionRequest $request)
    {

        if ($request->phone==0){
            Session::flash('error',Session::get('client_lang')?'حقل الهاتف غير صحيح':'Le format du champ téléphone est incorrect');
            return redirect()->back()->withInput();
        }




        $wilaya=DB::table('yalidine_wilayas')->find($request->wilaya);
       $client= Client::create([
            'phone' => $request->phone,
            'wilaya' => $wilaya->name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'commune_id' => $request->commune_id,
        ]);

        $client_wallet = Client_wallet::create(['amount' => 0 , 'client_id' => $client->id]);

        Auth::guard('client')->loginUsingId($client->id);
        Session::forget('wilaya');
        Session::forget('commune');
        Session::flash('message',Session::get('client_lang')?'مرحبا':'Bienvenue');
        return redirect()->route('client.account');
    }



    public function prepareForValidation(ActionRequest $request): void
    {
        $request->merge(['phone' => $this->getPhoneNumberClean($request->phone)]);
    }

    private function getPhoneNumberClean($phone)
    {
        if (Str::startsWith($phone, '00213') && strlen($phone) ===14) return explode('00213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0213') && strlen($phone) ===13) return explode('0213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '+213') && strlen($phone) ===13) return explode('+213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '213') && strlen($phone) ===12) return explode('213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0') && strlen($phone) ===10) return explode('0', $phone, 2)[1];
        elseif ((Str::startsWith($phone, '6') || Str::startsWith($phone, '5') || Str::startsWith($phone, '7')) && strlen($phone) ===9) return $phone;
        else return 0;
    }


    public function rules(): array
    {

        $wilaya = YalidineWilaya::query()->find(request()->wilaya);
        $commune = YalidineMairie::query()->find(request()->commune_id);
        if ($wilaya) {
            Session::put([
                'wilaya' => $wilaya->id ?? 0,
            ]);

        }

        if ($commune) {
            Session::put([
                'commune' => [
                    'id' => $commune->id ?? '',
                    'name' => $commune->name ?? ''
                ]
            ]);
        }

        return [
            'phone' => ['required','unique:clients,phone',new PhoneNumber],
            'wilaya' => ['required','exists:yalidine_wilayas,id'],
            'commune_id' => ['required','exists:yalidine_mairies,id'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['required','regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu' ,'string','max:45'],
            'last_name' => ['required','regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'string','max:45'],
            'email' => ['required', 'email', 'unique:clients,email'],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'phone' => trans('Téléphone'),
            'wilaya' => trans('Wilaya'),
            'first_name' => trans('Prénom'),
            'last_name' => trans('Nom'),
            'password' => trans('Mot de passe'),
            'commune_id' =>trans('Commune'),
        ];
    }

}
