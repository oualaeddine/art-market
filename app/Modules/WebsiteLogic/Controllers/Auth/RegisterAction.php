<?php

namespace App\Modules\WebsiteLogic\Controllers\Auth;

use App\Helpers\GetCleanPhoneNumber;
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
            Session::flash('error',trans('The phone number is incorrect'));
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
        $request->merge(['phone' => GetCleanPhoneNumber::getPhone($request->phone)]);
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
